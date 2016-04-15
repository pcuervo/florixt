<?php

/*
Plugin Name: Cactus - EDD - Addon
Description: An Add-on for Easy Digital Download plugin
Author: CactusThemes
Version: 1.0
Author URI: http://cactusthemes.com
*/

/**
 * @package Business-Hub
 * @version 1.0
 */

/************************  EDD ADDON  ************************/
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if(!function_exists('addon_get_plugin_url')){
	function addon_get_plugin_url(){
		return plugin_dir_path(__FILE__);
	}
}
if(!class_exists('businesshub_edd_addon')){
include  addon_get_plugin_url().'widget/latest-product.php';
include  addon_get_plugin_url().'widget/product-search.php';
class businesshub_edd_addon{
	/* custom template relative url in theme, default is "businesshub_portfolio" */
	public $template_url;
	/* Plugin path */
	public $plugin_path;

	/* Main query */
	public $query;
	
	private static $instance;

	protected $templates;

	public function __construct() {
		// constructor
		$this->includes();
		//$this->register_configuration();
		 // Add a filter to the attributes metabox to inject template into the cache.
                add_filter(
					'page_attributes_dropdown_pages_args',
					 array( $this, 'register_project_templates' )
				);


                // Add a filter to the save post to inject out template into the page cache
                add_filter(
					'wp_insert_post_data',
					array( $this, 'register_project_templates' )
				);


                // Add a filter to the template include to determine if the page has our
				// template assigned and return it's path
                add_filter(
					'template_include',
					array( $this, 'view_project_template')
				);

                // Add your templates to this array.
                $this->templates = array(
                        'templates/edd-page-template.php'     => 'EDD Page Template',
                );

		add_action( 'init', array($this,'init'), 0);
		//add_action( 'template_redirect', array($this,'ct_stop_redirect'), 0);
		//add_action( 'after_setup_theme', array(&$this, 'register_bt') );
		add_action( 'after_setup_theme', array(&$this, 'register_configuration') );
	}
	
	public function register_project_templates( $atts ) {

                // Create the key used for the themes cache
                $cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );

                // Retrieve the cache list.
				// If it doesn't exist, or it's empty prepare an array
				$templates = wp_get_theme()->get_page_templates();
                if ( empty( $templates ) ) {
                        $templates = array();
                }

                // New cache, therefore remove the old one
                wp_cache_delete( $cache_key , 'themes');

                // Now add our template to the list of templates by merging our templates
                // with the existing templates array from the cache.
                $templates = array_merge( $templates, $this->templates );

                // Add the modified cache to allow WordPress to pick it up for listing
                // available templates
                wp_cache_add( $cache_key, $templates, 'themes', 1800 );

                return $atts;

        }

        /**
         * Checks if the template is assigned to the page
         */
        public function view_project_template( $template ) {

                global $post;

				if(is_page()){
					if (!isset($this->templates[get_post_meta($post->ID, '_wp_page_template', true)] ) ) {
						return $template;
					}
					$file = plugin_dir_path(__FILE__). get_post_meta(
						$post->ID, '_wp_page_template', true
					);

					// Just to be safe, we check if the file exist first
					if( file_exists( $file ) ) {
							return $file;
					}
					else { echo $file; }
				}else{
                	return $template;
				}
        }

	/*function register_bt(){
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
	    	return;
		}
		if ( get_user_option('rich_editing') == 'true' ) {
			add_filter( 'mce_buttons_3', array(&$this, 'reg_btn') );
		}
	}
	function reg_btn($buttons)
	{
		array_push($buttons, 'shortcode_jobs');
		return $buttons;
	}

	function ct_stop_redirect(){
		if ( is_singular('ct_portfolio') ) {
			global $wp_query;
			$page = (int) $wp_query->get('page');
			if ( $page > 1 ) {
		 		 // convert 'page' to 'paged'
		  		$query->set( 'page', 1 );
		  		$query->set( 'paged', $page );
			}
		// prevent redirect
		remove_action( 'template_redirect', 'redirect_canonical' );
	  }
	}*/
	function ct_scripts_styles() {
		global $wp_styles;

		/*
		 * Loads our main javascript.
		 */
		wp_enqueue_script( 'custom',plugins_url('/js/custom.js', __FILE__) , array(), '', true );
	}

	function includes(){
		// custom meta boxes
		if(!function_exists('cmb_init')){
			if(!class_exists('CMB_Meta_Box')){
				include_once addon_get_plugin_url().'includes/Custom-Meta-Boxes-master/custom-meta-boxes.php';
			}
		}
		if(!class_exists('Options_Page')){
			include_once addon_get_plugin_url().'includes/options-page/options-page.php';
		}
		//include_once('classes/u-project-query.php');
	}

	/* This is called as soon as possible to set up options page for the plugin
	 * after that, $this->get_option($name) can be called to get options.
	 *
	 */
	function register_configuration(){
		global $ct_edd_addon_settings;
		$ct_edd_addon_settings = new Options_Page('ct_edd_addon_settings', array('option_file'=>dirname(__FILE__) . '/options.xml','menu_title'=>__('EDD Addon Settings','cactus'),'menu_position'=>null), array('page_title'=>__('Edd - Addon Settings','cactus'),'submit_text'=>__('Save','cactus')));
	}

	/* Get main options of the plugin. If there are any sub options page, pass Options Page Id to the second args
	 *
	 *
	 */
	function get_option($option_name, $op_id = ''){
		return $GLOBALS[$op_id != ''?$op_id:'ct_edd_addon_settings']->get($option_name);
	}

	function init(){
		// Variables
		$this->register_taxonomies();
		$this->template_url			= apply_filters( 'ct_edd_addon_template_url', 'cactus-edd-addon/' );
		add_filter( 'cmb_meta_boxes', array($this,'register_post_type_metadata') );
		add_filter( 'template_include', array( $this, 'template_loader' ) );
		add_action( 'template_redirect', array($this, 'template_redirect' ) );
		add_action( 'wp_enqueue_scripts', array($this, 'ct_scripts_styles') );
	}
	
	/**
	 * Get the plugin path.
	 *
	 * @access public
	 * @return string
	 */
	public function plugin_path() {
		if ( $this->plugin_path ) return $this->plugin_path;

		return $this->plugin_path = untrailingslashit( plugin_dir_path( __FILE__ ) );
	}
	/**
	 *
	 * Load custom page template for specific pages
	 *
	 * @return string
	 */
	function template_loader($template){
		$enable_single_page 	=  op_get('ct_edd_addon_settings','edd-addon-single-page');
		$enable_single_page 	= isset($enable_single_page) && $enable_single_page != '' ? $enable_single_page : 'on';
		$find = array('cactus-edd-addon.php');
		$file = '';
		$slug_lis = '';
		if(isset($enable_single_page) && $enable_single_page == 'on'){
			$slug_lis =  $this->get_option('edd-addon-listing-page');
		}
		if(!is_numeric($slug_lis)){
			$slug_lis = 'product-news-listing';
		}
		if(is_post_type_archive( 'ct_edd_addon' ) || is_page($slug_lis) ){
			$file = 'archive-edd-addon.php';
			$find[] = $file;
			$find[] = $this->template_url . $file;
		}
		elseif(is_singular('ct_edd_addon')){
			$file = 'single-edd-addon.php';
			$find[] = $file;
			$find[] = $this->template_url . $file;
		}
		if ( $file ) {
			$template = locate_template( $find );

			if ( ! $template ) $template = $this->plugin_path() . '/templates/' . $file;
		}
		return $template;
	}

	/**
	 * Handle redirects before content is output - hooked into template_redirect so is_page works.
	 *
	 * @access public
	 * @return void
	 */
	function template_redirect(){
		global $ct_channel, $wp_query;
		$slug_cn =  op_get('ct_edd_addon_settings','edd-addon-product-slug');
		if(is_numeric($slug_cn)){
			$slug_cn = get_post($slug_cn);
			$slug_cn = $slug_cn->post_name;
		}
		if($slug_cn==''){
			$slug_cn = 'product-news';
		}
		// When default permalinks are enabled, redirect stores page to post type archive url
		if ( ! empty( $_GET['page_id'] ) && get_option( 'permalink_structure' ) == "" && $_GET['page_id'] ==  $slug_cn) {
			wp_safe_redirect( get_post_type_archive_link('ct_edd_addon') );
			exit;
		}
	}
	function register_taxonomies(){
		$this->register_ct_channel();
	}

	/* Register ct_channel post type and its custom taxonomies */
	function register_ct_channel(){
		$labels = array(
			'name'               => __('Product News', 'cactus'),
			'singular_name'      => __('Product News', 'cactus'),
			'add_new'            => __('Add Product News', 'cactus'),
			'add_new_item'       => __('Add Product News', 'cactus'),
			'edit_item'          => __('Edit Product News', 'cactus'),
			'new_item'           => __('New Product News', 'cactus'),
			'all_items'          => __('All Product News', 'cactus'),
			'view_item'          => __('View Product News', 'cactus'),
			'search_items'       => __('Search Product News', 'cactus'),
			'not_found'          => __('No Product News found', 'cactus'),
			'not_found_in_trash' => __('No Product News found in Trash', 'cactus'),
			'parent_item_colon'  => '',
			'menu_name'          => __('EDD Addon', 'cactus'),
		  );
		$slug_cn =  op_get('ct_edd_addon_settings','edd-addon-product-slug');
		$slug_cn = isset($slug_cn) && $slug_cn != '' ? $slug_cn : '';
		
		if(is_numeric($slug_cn)){
			$slug_cn = get_post($slug_cn);
			$slug_cn = $slug_cn->post_name;
		}
		if($slug_cn == ''){
			$slug_cn = 'product-news';
		}
		if ( $slug_cn )
			$rewrite =  array( 'slug' => untrailingslashit( $slug_cn ), 'with_front' => false, 'feeds' => true );
		else
			$rewrite = false;
	
		$enable_single_page 	=  op_get('ct_edd_addon_settings','edd-addon-single-page');
		$enable_single_page 	= isset($enable_single_page) && $enable_single_page != '' ? $enable_single_page : 'on';
		if(isset($enable_single_page) && $enable_single_page == 'on'){
			$enable_single_page = true;
		}else{
			$enable_single_page = false;
		}
		  $args = array(
			'labels'             => $labels,
			'public'             => $enable_single_page,
			'publicly_queryable' => $enable_single_page,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => $rewrite,
			'capability_type'    => 'post',
			'has_archive'        => $enable_single_page,
			'hierarchical'       => false,
			'menu_position'      => null,
			'menu_icon' 		 => 'dashicons-download',
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt','comments')
		  );
		register_post_type( 'ct_edd_addon', $args );
	}
	
	function register_post_type_metadata(array $meta_boxes){
		// register aff store metadata
		$fields = array(
				array( 'id' => 'product_news_tag', 'name' => esc_html__('Tag','cactus'), 'type' => 'text' , 'desc' => esc_html__('Enter a tag for the news. For example "hot", "new"','cactus'), 'repeatable' => false, 'multiple' => false),
				array( 'id' => 'product_news_tag_color', 'name' => esc_html__('Tag Color','cactus'), 'type' => 'colorpicker' , 'desc' => esc_html__('Choose color for the tag','cactus'), 'repeatable' => false, 'multiple' => false),
				array( 'id' => 'product_news_published_date', 'name' => esc_html__('Published Date', 'cactus'), 'type' => 'select', 'options' => array( 'on' => esc_html__('On', 'cactus'), 'off' => esc_html__('Off', 'cactus') ),'desc' => esc_html__('Enable Published Date info', 'cactus'), 'repeatable' => false, 'multiple' => false),
				array( 'id' => 'product_news_comment_count', 'name' => esc_html__('Comment Count', 'cactus'), 'type' => 'select', 'options' => array( 'on' => esc_html__('On', 'cactus'), 'off' => esc_html__('Off', 'cactus') ),'desc' => esc_html__('Enable Comment Count info', 'cactus'), 'repeatable' => false, 'multiple' => false),
				array( 'id' => 'product_news_social_share', 'name' => esc_html__('Social Sharing', 'cactus'), 'type' => 'select', 'options' => array( 'on' => esc_html__('On', 'cactus'), 'off' => esc_html__('Off', 'cactus') ),'desc' => esc_html__('Enable Social Sharing', 'cactus'), 'repeatable' => false, 'multiple' => false),
				array( 'id' => 'product_news_post_nav', 'name' => esc_html__('Post Navigation', 'cactus'), 'type' => 'select', 'options' => array( 'on' => esc_html__('On', 'cactus'), 'off' => esc_html__('Off', 'cactus') ),'desc' => esc_html__('Enable Post Navigation', 'cactus'), 'repeatable' => false, 'multiple' => false),
				array( 'id' => 'product_news_comment', 'name' => esc_html__('Disable Comments by default', 'cactus'), 'type' => 'select', 'options' => array( 'on' => esc_html__('On', 'cactus'), 'off' => esc_html__('Off', 'cactus') ),'desc' => esc_html__('Disable comments on single Product News', 'cactus'), 'repeatable' => false, 'multiple' => false),
				array( 'id' => 'product_news_related', 'name' => esc_html__('Related Product ','cactus'), 'type' => 'post_select', 'use_ajax' => true, 'query' => array( 'post_type' => 'download' ), 'repeatable' => false, 'multiple' => false),
		);
		$meta_boxes[] = array(
			'title' => esc_html__('Product News Settings','cactus'),
			'pages' => 'ct_edd_addon',
			'fields' => $fields,
			'priority' => 'high'
		);
		return $meta_boxes;
	}

}

} // class_exists check
/**
 * Init Cactus_channel
 */
$GLOBALS['businesshub_edd_addon'] = new businesshub_edd_addon();
/************************  EDD ADDON  ************************/

/************************  EDD ADDON PAGE TEMPLATE  ************************/

/************************  EDD ADDON PAGE TEMPLATE  ************************/

/************************  RATING  ************************/
define( 'TMR_PATH', plugin_dir_url( __FILE__ ) );
// if( ! class_exists( 'OT_Loader' ) ) {
	require_once addon_get_plugin_url().'option-tree/ot-loader.php';
// }
require_once addon_get_plugin_url().'admin/plugin-options.php';
// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

class cactusRating{
	public $tmr_id = 1;
	//construct
	public function __construct()
    {
		add_shortcode( 'tmreview', array( $this, 'tmr_shortcode' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'tmr_frontend_scripts' ) );
		add_action( 'after_setup_theme', array( $this, 'tmr_post_meta' ) );
		add_action( 'save_post', array( $this, 'tm_review_save_post') );

		if (is_admin()) {
			add_action( 'wp_ajax_add_user_rate', array( $this, 'ct_wp_ajax_add_user_rate') );
			add_action( 'wp_ajax_nopriv_add_user_rate', array( $this, 'ct_wp_ajax_add_user_rate') );
		}

		add_filter( 'the_content', array( $this, 'tmr_the_content_filter'), 20 );
		add_filter( 'get_the_content', array( $this, 'tmr_the_content_filter'), 20 );
		add_filter( 'mce_external_plugins', array(&$this, 'regplugins'));
		add_filter( 'mce_buttons_3', array(&$this, 'regbtns') );
    }
	/*
	 * Setup and do shortcode
	 */
	function tmr_shortcode($atts,$content=""){
		$tmr_options 					= $this->tmr_get_all_option();
		$tmr_criteria 					= $tmr_options['tmr_criteria']?explode(",", $tmr_options['tmr_criteria']):'';
		$tmr_float 						= isset($atts['float'])? $atts['float']:$tmr_options['tmr_float'];
		$tmr_title 						= isset($atts['title'])? $atts['title']:(get_post_meta(get_the_ID(),'review_title',true)?get_post_meta(get_the_ID(),'review_title',true):$tmr_options['tmr_title']);
		$tmr_options['tmr_rate_type'] 	= (get_post_meta(get_the_ID(),'rate_type',true) != ''?get_post_meta(get_the_ID(),'rate_type',true):$tmr_options['tmr_rate_type']);
		ob_start();
		if(isset($atts['post_id'])){
			$post_id=$atts['post_id'];
		}else{
			global $post;
			$post_id=$post->ID;
		}
		$slide = 'slideInLeft';
			if(ot_get_option( 'rtl', 'off') == 'on')
				$slide = 'slideInRight';
		?>
		<?php 
		$final_s = get_post_meta($post_id,'final_summary',true);
		$total_e = get_post_meta($post_id,'taq_review_score',true);
		if($tmr_options['tmr_rate_type'] == 'point'):
			$check_ex= 0;?>
	        <div class="item item-review module" id="tmr<?php echo $this->tmr_id; ?>">

	            	<h4><?php echo $tmr_title; ?></h4>
                    <div class="box-text clearfix">
                    	<?php if($final_s!=''){$check_ex= 1;?>
	                		<span class="score"><?php echo number_format(get_post_meta($post_id,'taq_review_score',true)/10,1);?></span>
                        <?php }
                        if($total_e!='' && $total_e!=0){ $check_ex= 1;?>
	                    	<p><?php echo get_post_meta($post_id,'final_summary',true) ?></p>
                        <?php }?>
	                </div>
	                <div class="tmr-criteria">
	                <?php if($tmr_criteria){
						foreach($tmr_criteria as $criteria){
							$point = get_post_meta($post_id,'review_'.sanitize_title($criteria),true);
							if($point){
							?>
	                            <div class="box-progress">
	                            <h5><?php echo $criteria ?><span class="score"><?php echo number_format($point/10,1); ?></span></h5>
	                            	<div class="progress">
	                                    <div class="inner wow <?php echo $slide;?>" style="visibility: hidden; -webkit-animation-name: none; -moz-animation-name: none; animation-name: none;">
	                                        <div class="progress-bar" style="width: <?php echo $point;?>%"></div>
	                                    </div>
	                                 </div>
	                            </div>
	                        <?php
							}
						}
					}

					if($custom_review = get_post_meta($post_id,'custom_review',true)){
						foreach($custom_review as $review){
							if($review['review_point']){ $check_ex= 1; ?>
								<div class="box-progress">
	                            	<h5><?php echo $review['title'] ?><span class="score"><?php echo number_format($review['review_point']/10,1);?></span></h5>
	                                 <div class="progress">
	                                    <div class="inner wow <?php echo $slide;?>" style="visibility: hidden; -webkit-animation-name: none; -moz-animation-name: none; animation-name: none;">
	                                        <div class="progress-bar" style="width: <?php echo $review['review_point'];?>%"></div>
	                                    </div>
	                                 </div>
	                            </div>
							<?php }
						}
					}
					?>
	                </div>
	                <?php
	                	if($tmr_options['tmr_user_rate'] == 'all')
	                		$this->user_rate_html($tmr_options);
	                	else if($tmr_options['tmr_user_rate']=='only_user')
	                		if(is_user_logged_in())
	                			$this->user_rate_html($tmr_options);
	                ?>
	        </div><!--/tmr-wrap-->
	    <?php else:
			$check_ex= 0;
			?>
	        <div class="star-rating-block" id="tmr<?php echo $this->tmr_id; ?>">
	        	<div class="rating-title"><?php echo $tmr_title; ?></div>
                <?php if($final_s!='' || $total_e!=''){?>
                    <div class="rating-summary-block">
                        <?php if($final_s!=''){$check_ex= 1;?>
                        <div class="rating-summary">
                        	<span>
                            	<?php echo $final_s ?>
                            </span>
                        </div>
                        <?php }
                        if($total_e!='' && $total_e!=0){$check_ex= 1;?>
                        <div class="rating-stars">
                        	<div class="rating-stars-content">
                            	<?php 
									//$this->tmr_draw_star(get_post_meta($post_id,'taq_review_score',true));
									$this->tmr_draw_star_point(get_post_meta($post_id,'taq_review_score',true));
								?>
                            </div>                            
                        </div>
                        <?php }?>
                    </div>
				<?php }?>
				<div class="rating-criteria-block">
		        	<?php if($tmr_criteria){
						foreach($tmr_criteria as $criteria){
							$point = get_post_meta($post_id,'review_'.sanitize_title($criteria),true);
							if($point){
							?>
		                            <div class="rating-item">
		                            	<div class="criteria-title"><?php echo $criteria; ?></div>
		                                <span class="rating-stars">
		                                   <?php $this->tmr_draw_star($point); ?>
		                                </span>
		                            </div>
	                        <?php
							}
						}
					}

					if($custom_review = get_post_meta($post_id,'custom_review',true)){
						foreach($custom_review as $review){
							if($review['review_point']){$check_ex= 1; ?>
								 	<div class="rating-item">
		                            	<div class="criteria-title"><?php echo $review['title'] ?></div>
		                                <span class="rating-stars">
		                                   <?php $this->tmr_draw_star($review['review_point']); ?>
		                                </span>
		                            </div>
							<?php }
						}
					}
					?>
				</div>
				<?php
                	if($tmr_options['tmr_user_rate'] == 'all')
                		$this->user_rate_html($tmr_options);
                	else if($tmr_options['tmr_user_rate']=='only_user')
                		if(is_user_logged_in())
                			$this->user_rate_html($tmr_options);
                ?>
	        </div><!--/tmr-wrap-->
    	<?php endif;
		if($check_ex == 0 && get_post_meta($post_id,'user_rate_option',true)=='off'){
			?>
            <style type="text/css">#tmr<?php echo $this->tmr_id; ?>{ display:none;}</style>
            <?php
		}
		$this->tmr_id++;
		$output_string=ob_get_contents();
		ob_end_clean();
		return $output_string;
	}

	function user_rate_html($tmr_options = array())
	{
		$rtl = false;
		$direction ='';
		if(ot_get_option( 'rtl', 'off') == 'on')
		{
			$direction = 'dir="ltr"';
			$rtl = true;
		}


		global $post;
     	$post_id  		= $post->ID;
		$total_user_rate_meta 	= get_post_meta($post_id, 'total_user_rate', true);
		$avg_score_rate_meta 	= get_post_meta($post_id, 'avg_score_rate', true);

		$total_user_rate 		= $total_user_rate_meta != '' ?  $total_user_rate_meta : 0;
		$avg_score_rate			= $avg_score_rate_meta != '' ? 	$avg_score_rate_meta : 0;

		$user_rate_option_meta  = get_post_meta($post_id,'user_rate_option',true);
		$user_rate_option 		= $user_rate_option_meta != '' ? $user_rate_option_meta : 'on';

		if($user_rate_option != '' && $user_rate_option == 'on') {
			if($tmr_options['tmr_rate_type'] == 'point'){
		?>
		        <div class="box-progress ct-vote">
		        	<h5>
		        		<span class="rating_title"><?php echo esc_html__('Reader Rating', 'cactus');?>: </span>
		        		<span class="total_user_rate" <?php echo $direction;?>>(
		        			<?php $vote_str = $total_user_rate > 1 ?  esc_html__('votes', 'cactus') : esc_html__('vote', 'cactus');?>
		        			<?php echo $total_user_rate;?> <?php echo $vote_str;?>
		        			)</span>
		        		<span class="score"><?php echo $avg_score_rate;?></span>
		        	</h5>
					<div class="progress ct-progress">
						<div class="inner wow slideInLeft" style="visibility: hidden; -webkit-animation-name: none; -moz-animation-name: none; animation-name: none;">
						    <div class="progress-bar" style="width: <?php echo $avg_score_rate * 10;?>%"></div>
						</div>
					</div>
		         	<p class="msg"></p>
		        </div>
<?php 		}
			else
			{
				?>
				<div class="user-rating-block">
	        		<div class="rating-item">
	        			<div class="criteria-title"> <?php echo esc_html__('USER RATING', 'cactus')?>: <span>(
		        			<?php $vote_str = $total_user_rate > 1 ?  esc_html__('votes', 'cactus') : esc_html__('vote', 'cactus');?>
		        			<?php echo $total_user_rate;?> <?php echo $vote_str;?>
		        			)</span></div>
		        		<div class="rating-stars">
		        			<div class="rating-block">
		        			 	<div id="rating-id" data-score="<?php echo ($avg_score_rate * 10) / 20;?>"></div>
		        			 	<p class="msg"></p>
		        			 </div>
		        		</div>
	        		</div>
	        	</div>
<?php
			}

			$flag 			= false;
	     	if ( is_user_logged_in() )
			{
	         	$user_ID = get_current_user_id();
	         	$user_meta = get_user_meta($user_ID, 'post_id_voted', true);
	     		$post_id_voted_arr = $user_meta != '' ? explode(',', $user_meta) : array();
	         	foreach($post_id_voted_arr as $id)
	         	{
	         		if($id == $post_id)
	         			$flag = true;
	         	}
	     		echo '<input type="hidden" name="hidden_flag" value="' . $flag . ' "/>';
	     	}

	     	$static_text = esc_html__('Your Rating', 'cactus') . ',' . esc_html__('Reader Rating', 'cactus') . ',' . esc_html__('votes', 'cactus') . ',' . esc_html__('You have already voted', 'cactus') . ',' . esc_html__('vote', 'cactus');
	     	?>
	     	<input type="hidden" name="hidden_rtl" value="<?php echo $rtl;?>"/>
	     	<input type="hidden" name="post_id" value="<?php echo $post_id;?>"/>
	     	<input type="hidden" name="hidden_total_user_rate" value="<?php echo $total_user_rate;?>"/>
	     	<input type="hidden" name="hidden_avg_score_rate" value="<?php echo $avg_score_rate;?>"/>
	     	<input type="hidden" name="hidden_static_text" value="<?php echo $static_text;?>"/>
	     	<input type="hidden" name="rating_type" value="<?php echo $tmr_options['tmr_rate_type'];?>"/>
	     	<?php
		}
	}

	function tmr_draw_star($point){
		for($i=1;$i<=5;$i++){
			$class='';
			if(round($point/20,1)<($i-0.5)){
				$class='-o';
			}elseif(round($point/20,1)<$i){
				$class='-half-o';
			}
			echo '<i class="fa fa-star'.$class.'"></i> ';
		}
	}
	
	function tmr_draw_star_point($point){
		$pointResult = round($point/20,1);		
		echo '<span>'.$pointResult.'</span> <i class="fa fa-star"></i>';
	}
	/*
	 * Get all plugin options
	 */
	public static function tmr_get_all_option(){
		$tmr_options = get_option('tmr_options_group');
		$tmr_options['tmr_criteria'] = isset($tmr_options['tmr_criteria'])?$tmr_options['tmr_criteria']:'';
		$tmr_options['tmr_position'] = isset($tmr_options['tmr_position'])?$tmr_options['tmr_position']:'bottom';
		$tmr_options['tmr_float'] = isset($tmr_options['tmr_float'])?$tmr_options['tmr_float']:'block';
		$tmr_options['tmr_fontawesome'] = isset($tmr_options['tmr_fontawesome'])?$tmr_options['tmr_fontawesome']:0;
		$tmr_options['tmr_title']= isset($tmr_options['tmr_title'])?$tmr_options['tmr_title']:'';
		$tmr_options['tmr_user_rate']= isset($tmr_options['tmr_user_rate'])?$tmr_options['tmr_user_rate']:'all';
		$tmr_options['tmr_rate_type']= isset($tmr_options['tmr_rate_type'])?$tmr_options['tmr_rate_type']:'point';
		return $tmr_options;
	}
	/*
	 * Load js and css
	 */
	function tmr_frontend_scripts(){
	  	wp_enqueue_script( 'ct_rating-ajax', TMR_PATH.'js/main.js', array('jquery'), 1, true );
	  	wp_enqueue_script( 'wow', TMR_PATH . 'js/wow.min.js', array( 'jquery' ), 1, true );

		wp_enqueue_style('truemag-rating', TMR_PATH.'/css/style.css');
		wp_enqueue_style('animate', TMR_PATH.'css/animate.min.css');

		//star rating

	  	wp_enqueue_script( 'raty', TMR_PATH . 'js/jquery.raty-fa.js', array( 'jquery' ), 1, true );

		$tmr_options = $this->tmr_get_all_option();
		if($tmr_options['tmr_fontawesome']==0){
			/*wp_enqueue_style('font-awesome', TMR_PATH.'font-awesome/css/font-awesome.min.css');*/ //remove load font awesome
		}
	}


	//review save
	function tm_review_save_post($post_ID){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return;
		if ( ! current_user_can( 'edit_post', $post_ID ) )
			return;

		$review_total = 0;
		$review_count = 0;
		$tmr_options = $this->tmr_get_all_option();
		$tmr_criteria = $tmr_options['tmr_criteria']?explode(",", $tmr_options['tmr_criteria']):'';
		if($tmr_criteria){
			foreach($tmr_criteria as $criteria){
				if(isset($_POST['review_'.sanitize_title($criteria)])){
					$review_total += $_POST['review_'.sanitize_title($criteria)];
					$review_count++;
				}
			}
		}
		if(isset($_POST['custom_review'])){
			foreach($_POST['custom_review'] as $review){
				if($review['review_point']){
					$review_total += $review['review_point'];
					$review_count++;
				}
			}
		}
		if($review_count){
			update_post_meta( $post_ID, 'taq_review_score', round($review_total/$review_count,10));
		}
	}
	//the_content filter
	function tmr_the_content_filter($content){
		if (is_singular('download')){
			$tmr_options = $this->tmr_get_all_option();
			if($tmr_options['tmr_position']=='top'){
				$content = '[tmreview /]'.$content;
			}elseif($tmr_options['tmr_position']=='bottom'){
				$content .= '[tmreview /]';
			}
		}
		// Returns the content.
		return do_shortcode($content);
	}

	function tmr_post_meta(){
		//option tree
		  $meta_box_review = array(
			'id'        => 'meta_box_review',
			'title'     => esc_html__('Review', 'cactus'),
			'desc'      => '',
			'pages'     => array( 'download' ),
			'context'   => 'normal',
			'priority'  => 'high',
			'fields'    => array(
				array(
					'label'       => esc_html__('Review Title', 'cactus'),
					'id'          => 'review_title',
					'type'        => 'text',
					'class'       => '',
					'desc'        => esc_html__('Review title for this post', 'cactus'),
					'choices'     => array(),
					'settings'    => array()
			   )
		  	)
		  );
		  $tmr_options = $this->tmr_get_all_option();
		  $tmr_criteria = $tmr_options['tmr_criteria']?explode(",", $tmr_options['tmr_criteria']):'';
		  if($tmr_criteria){
			  foreach($tmr_criteria as $criteria){
				  $meta_box_review['fields'][] = array(
					  'id'          => 'review_'.sanitize_title($criteria),
					  'label'       => $criteria,
					  'desc'        => esc_html__('Point (Ex: 95)', 'cactus'),
					  'std'         => '',
					  'type'        => 'text',
					  'class'       => '',
					  'choices'     => array()
				  );
			  }
		  }
		  $meta_box_review['fields'][] = array(
				'label'       => esc_html__('Custom Review Criterias', 'cactus'),
				'id'          => 'custom_review',
				'type'        => 'list-item',
				'class'       => '',
				'desc'        => esc_html__('Add custom reviews', 'cactus'),
				'choices'     => array(),
				'settings'    => array(
					 array(
						'label'       => esc_html__('Point (Score of 100)','cactus'),
						'id'          => 'review_point',
						'type'        => 'text',
						'desc'        => '',
						'std'         => '',
						'rows'        => '',
						'post_type'   => '',
						'taxonomy'    => ''
					 ),
				)
		  );
		  $meta_box_review['fields'][] = array(
			  'id'          => 'final_summary',
			  'label'       => esc_html__('Final Review Summary', 'cactus'),
			  'desc'        => esc_html__('Ex: This is must-watch movie of this year', 'cactus'),
			  'std'         => '',
			  'type'        => 'textarea',
			  'class'       => '',
			  'choices'     => array()
		  );
		  $meta_box_review['fields'][] = array(
			  'id'          => 'user_rate_option',
			  'label'       => esc_html__('User Rate Option', 'cactus'),
			  'desc'        => esc_html__('Enable user rate option', 'cactus'),
			  'std'         => 'on',
			  'type'        => 'on-off',
			  'class'       => ''
		  );
		  $meta_box_review['fields'][] = array(
			  'id'          => 'rate_type',
			  'label'       => esc_html__('Rate type', 'cactus'),
			  'desc'        => esc_html__('Choose default to use setting in Rating Config', 'cactus'),
			  'std'         => '',
			  'type'        => 'select',
			  'class'       => '',
			  'choices'     => array(
			  			array(
		  			      'value'       => '',
		  			      'label'       => esc_html__( 'Default', 'cactus' ),
		  			      'src'         => ''
		  			    ),
		  			    array(
		  			      'value'       => 'point',
		  			      'label'       => esc_html__( 'Point', 'cactus' ),
		  			      'src'         => ''
		  			    ),
		  			  	array(
		  			      'value'       => 'star',
		  			      'label'       => esc_html__( 'Star', 'cactus' ),
		  			      'src'         => ''
		  			    )
		  			  )
		  );
		  if (function_exists('ot_register_meta_box')) {
			ot_register_meta_box( $meta_box_review );
		  }
	}
	function regbtns($buttons)
	{
		array_push($buttons, 'tm_rating');
		return $buttons;
	}

	function regplugins($plgs)
	{
		$plgs['tm_rating'] = TMR_PATH . 'js/button.js';
		return $plgs;
	}

	function ct_wp_ajax_add_user_rate()
	{
		$score 		=  isset($_POST['score']) ? $_POST['score'] : 0;

		//get all user rated of posts
		if(isset($_POST['post_id']))
		{
			//get post id from ajax
			$post_id 			= $_POST['post_id'];

			$total_user_rate 	= get_post_meta($post_id, 'total_user_rate', true);
			$avg_score_rate 	= get_post_meta($post_id, 'avg_score_rate', true);

			//first time
			if($total_user_rate == '' && $avg_score_rate == '')
			{
				add_post_meta($post_id, 'total_user_rate', 1);
				add_post_meta($post_id, 'avg_score_rate', $score);
			}
			//if database had record
			else
			{
				update_post_meta($post_id, 'total_user_rate', $total_user_rate + 1);
				update_post_meta($post_id, 'avg_score_rate', round(($total_user_rate * $avg_score_rate + $score) / ($total_user_rate + 1), 1));
			}

			//if logged in
			if ( is_user_logged_in() )
			{
				$user_ID = get_current_user_id();

				$user_meta = get_user_meta($user_ID, 'post_id_voted', true);

				if($user_meta == '')
				{
					//save to user_metadata
					add_user_meta($user_ID, 'post_id_voted', $post_id);
				}
				else
				{
					$data = $user_meta . ',' . $post_id;
					update_user_meta($user_ID, 'post_id_voted', $data);
				}
			}
			else
			{
				//first vote
				if(!isset($_COOKIE['post_id_voted']))
				{
					//save to cookie
					setcookie('post_id_voted', $post_id, time()+60*60*24*30, '/');
				}
				else
				{
					$cookie_post_id_voted = $_COOKIE['post_id_voted'];
					setcookie('post_id_voted', $cookie_post_id_voted . '-' . $post_id, time()+60*60*24*30, '/');
				}
			}
		}
	}
}
$cactusRating = new cactusRating();
//convert hex 2 rgba
function tmr_hex2rgba($hex,$opacity) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $opacity = $opacity/100;
   $rgba = array($r, $g, $b, $opacity);
   return implode(",", $rgba); // returns the rgb values separated by commas
   //return $rgba; // returns an array with the rgb values
}
/************************  RATING  ************************/