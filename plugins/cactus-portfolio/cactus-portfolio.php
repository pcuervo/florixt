<?php

/*
Plugin Name: Cactus Portfolio
Description: Portfolio Custom Post Type and features
Author: CactusThemes
Version: 1.0
Author URI: http://cactusthemes.com
*/

/**
 * @package Business-Hub
 * @version 1.0
 */

/*translate settings*/
$businesshub_text_translate = esc_html__('General','cactus').esc_html__('Portfolio slug','cactus').esc_html__('Change single Portfolio slug. Remember to save the permalink settings again in Settings > Permalinks','cactus').esc_html__('Portfolio Listing','cactus').esc_html__('Listing Page','cactus').esc_html__('Assign Portfolios Listing page to a page. Remember to save the permalink settings again in Settings > Permalinks','cactus').esc_html__('Listing Style','cactus').esc_html__('Classic','cactus').esc_html__('Modern','cactus').esc_html__('Modern Square','cactus').esc_html__('Select style for Portfolio Listing page','cactus').esc_html__('Post Per Page','cactus').esc_html__('Number of posts per page in Portfolio Listing page','cactus').esc_html__('Fullwidth','cactus').esc_html__('On','cactus').esc_html__('Off','cactus').esc_html__('Portfolio Footer CTA content','cactus').esc_html__('Footer CTA Content for all Portfolio pages','cactus').esc_html__('Single Portfolio','cactus').esc_html__('Style','cactus').esc_html__('Big Gallery','cactus').esc_html__('Small Gallery','cactus').esc_html__('Big Image','cactus').esc_html__('Image List','cactus').esc_html__('Select default layout for single portfolio pages','cactus').esc_html__('Default Metadata','cactus').esc_html__('Define default metadata for all projects, ex: Client, Services...','cactus').esc_html__('Number of Related Portfolio','cactus').esc_html__('Heading Background','cactus').esc_html__('Background Image','cactus').esc_html__('Background Repeat','cactus').esc_html__('No repeat','cactus').esc_html__('Repeat','cactus').esc_html__('Repeat Horizontally','cactus').esc_html__('Repeat Vertically','cactus').esc_html__('Inherit','cactus').esc_html__('Background Position','cactus').esc_html__('Left Top','cactus').esc_html__('Left Center','cactus').esc_html__('Left Bottom','cactus').esc_html__('Center Top','cactus').esc_html__('Center Center','cactus').esc_html__('Center Bottom','cactus').esc_html__('Right Top','cactus').esc_html__('Right Center','cactus').esc_html__('Right Bottom','cactus').esc_html__('Background Size','cactus');

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if(!function_exists('port_get_plugin_url')){
	function port_get_plugin_url(){
		return plugin_dir_path(__FILE__);
	}
}
//include('shortcode/cactus-player.php');
if(!class_exists('businesshub_portfolio')){	
class businesshub_portfolio{
	/* custom template relative url in theme, default is "ct_portfolio" */
	public $template_url;
	/* Plugin path */
	public $plugin_path;
	
	/* Main query */
	public $query;
	
	public function __construct() {
		// constructor
		$this->includes();
		$this->register_configuration();
		
		add_action( 'init', array($this,'init'), 0);
		add_action( 'template_redirect', array($this,'ct_stop_redirect'), 0);
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
	}
	function ct_scripts_styles() {
		global $wp_styles;
		
		/*
		 * Loads our main javascript.
		 */	
		wp_enqueue_script( 'custom',plugins_url('/js/custom.js', __FILE__) , array(), '', true );
	}
	function admin_scripts_styles() {
		global $wp_styles;
			wp_enqueue_style('admin-portfolio-css',plugins_url('/css/admin-css.css', __FILE__));
	}
	
	function includes(){
		// custom meta boxes
		include_once port_get_plugin_url().'cactus-functions.php';
		if(!function_exists('cmb_init')){
			if(!class_exists('CMB_Meta_Box')){
				include_once port_get_plugin_url().'includes/Custom-Meta-Boxes-master/custom-meta-boxes.php';
			}
		}
		if(!class_exists('Options_Page')){
			include_once port_get_plugin_url().'includes/options-page/options-page.php';
		}
		//include_once('classes/u-project-query.php');
	}
	
	/* This is called as soon as possible to set up options page for the plugin
	 * after that, $this->get_option($name) can be called to get options.
	 *
	 */
	function register_configuration(){
		global $ct_portfolio_settings;
		$ct_portfolio_settings = new Options_Page('ct_portfolio_settings', array('option_file'=>dirname(__FILE__) . '/options.xml','menu_title'=>__('Portfolio Settings','cactus'),'menu_position'=>null), array('page_title'=>__('Portfolio Setting','cactus'),'submit_text'=>__('Save','cactus')));
	}
	
	/* Get main options of the plugin. If there are any sub options page, pass Options Page Id to the second args
	 *
	 *
	 */
	function get_option($option_name, $op_id = ''){
		return $GLOBALS[$op_id != ''?$op_id:'ct_portfolio_settings']->get($option_name);
	}
	
	function init(){
		// Variables
		$this->register_taxonomies();
		$this->template_url			= apply_filters( 'ct_port_template_url', 'cactus-portfolio/' );
		add_filter( 'cmb_meta_boxes', array($this,'register_post_type_metadata') );
		add_action( 'admin_init', array( $this, 'port_meta' ) );	
		add_filter( 'template_include', array( $this, 'template_loader' ) );
		add_action( 'template_redirect', array($this, 'template_redirect' ) );
		add_action( 'wp_enqueue_scripts', array($this, 'ct_scripts_styles') );
		add_action( 'admin_enqueue_scripts', array($this, 'admin_scripts_styles') );
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
		$find = array('cactus-portfolio.php');
		$file = '';
		$slug_lis = '';
		$slug_lis =  $this->get_option('portfolio-listing-page');
		if(!is_numeric($slug_lis)){
			$slug_lis = 'portfolios';
		}
		if(is_post_type_archive( 'ct_portfolio' ) || is_page($slug_lis) || is_tax('portfolio_cat')){
			$file = 'portfolio-listing.php';
			$find[] = $file;
			$find[] = $this->template_url . $file;
		}
		elseif(is_singular('ct_portfolio')){
			$file = 'single-portfolio.php';
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
		$slug_cn =  $this->get_option('portfolio-slug');
		if(is_numeric($slug_cn)){ 
			$slug_cn = get_post($slug_cn);
			$slug_cn = $slug_cn->post_name;
		}
		if($slug_cn==''){
			$slug_cn = 'portfolio';
		}
		// When default permalinks are enabled, redirect stores page to post type archive url
		if ( ! empty( $_GET['page_id'] ) && get_option( 'permalink_structure' ) == "" && $_GET['page_id'] ==  $slug_cn) {
			wp_safe_redirect( get_post_type_archive_link('ct_portfolio') );
			exit;
		}
	}
	function register_taxonomies(){
		$this->register_ct_channel();
	}
	
	/* Register ct_channel post type and its custom taxonomies */
	function register_ct_channel(){
		$labels = array(
			'name'               => __('Portfolio', 'cactus'),
			'singular_name'      => __('Portfolio', 'cactus'),
			'add_new'            => __('Add New Portfolio', 'cactus'),
			'add_new_item'       => __('Add New Portfolio', 'cactus'),
			'edit_item'          => __('Edit Portfolio', 'cactus'),
			'new_item'           => __('New Portfolio', 'cactus'),
			'all_items'          => __('All Portfolios', 'cactus'),
			'view_item'          => __('View Portfolio', 'cactus'),
			'search_items'       => __('Search Portfolio', 'cactus'),
			'not_found'          => __('No Portfolio found', 'cactus'),
			'not_found_in_trash' => __('No Portfolio found in Trash', 'cactus'),
			'parent_item_colon'  => '',
			'menu_name'          => __('Portfolios', 'cactus'),
		  );
		$slug_cn =  $this->get_option('portfolio-slug');
		if(is_numeric($slug_cn)){ 
			$slug_cn = get_post($slug_cn);
			$slug_cn = $slug_cn->post_name;
		}
		if($slug_cn==''){
			$slug_cn = 'portfolio';
		}
		if ( $slug_cn )
			$rewrite =  array( 'slug' => untrailingslashit( $slug_cn ), 'with_front' => false, 'feeds' => true );
		else
			$rewrite = false;

		  $args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => $rewrite,
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'menu_icon' 		  => 'dashicons-portfolio',
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt')
		  );
		register_post_type( 'ct_portfolio', $args );
		
		/* Register Channel Categories */
		$ct_cat_labels = array(
			'name'=>'Portfolio Categories',
			'singular_name'=>'Portfolio Category'
		);
		$ct_tag_labels = array(
			'name'=>'Portfolio Tags',
			'singular_name'=>'Portfolio Tags'
		);
		//register_taxonomy('portfolio_tags', 'ct_portfolio', array('labels'=>$ct_tag_labels,'meta_box_cb'=>array($this,'ct_type_meta_box_cb')));
		register_taxonomy('portfolio_cat', 'ct_portfolio', array('labels'=>$ct_cat_labels,'show_admin_column'=>true,'hierarchical'=>true,'rewrite'=>array('slug'=>''),'meta_box_cb'=>array($this,'ct_categories_meta_box_cb')));
	}			
	/* Register meta box for Store Type 
	 * Wordpress 3.8
	 */
	function ct_type_meta_box_cb($post, $box){
		$defaults = array('taxonomy' => 'post_tag');
		if ( !isset($box['args']) || !is_array($box['args']) )
			$args = array();
		else
			$args = $box['args'];
		extract( wp_parse_args($args, $defaults), EXTR_SKIP );
		$tax_name = esc_attr($taxonomy);
		$taxonomy = get_taxonomy($taxonomy);
		$user_can_assign_terms = current_user_can( $taxonomy->cap->assign_terms );
		$comma = _x( ',', 'tag delimiter' );
		?>
		<div class="tagsdiv" id="<?php echo $tax_name; ?>">
			<div class="jaxtag">
			<div class="nojs-tags hide-if-js">
			<p><?php echo $taxonomy->labels->add_or_remove_items; ?></p>
			<textarea name="<?php echo "tax_input[$tax_name]"; ?>" rows="3" cols="20" class="the-tags" id="tax-input-<?php echo $tax_name; ?>" <?php disabled( ! $user_can_assign_terms ); ?>><?php echo str_replace( ',', $comma . ' ', get_terms_to_edit( $post->ID, $tax_name ) ); // textarea_escaped by esc_attr() ?></textarea></div>
			<?php if ( $user_can_assign_terms ) : ?>
			<div class="ajaxtag hide-if-no-js">
				<label class="screen-reader-text" for="new-tag-<?php echo $tax_name; ?>"><?php echo $box['title']; ?></label>
				<div class="taghint"><?php echo $taxonomy->labels->add_new_item; ?></div>
				<p><input type="text" id="new-tag-<?php echo $tax_name; ?>" name="newtag[<?php echo $tax_name; ?>]" class="newtag form-input-tip" size="16" autocomplete="off" value="" />
				<input type="button" class="button tagadd" value="<?php esc_attr_e('Add'); ?>" /></p>
			</div>
			<p class="howto"><?php echo $taxonomy->labels->separate_items_with_commas; ?></p>
			<?php endif; ?>
			</div>
			<div class="tagchecklist"></div>
		</div>
		<?php if ( $user_can_assign_terms ) : ?>
		<p class="hide-if-no-js"><a href="#titlediv" class="tagcloud-link" id="link-<?php echo $tax_name; ?>"><?php echo $taxonomy->labels->choose_from_most_used; ?></a></p>
		<?php endif; ?>
		<?php
	}
	
	/**
	 * Display post categories form fields.
	 *
	 * @since 2.6.0
	 *
	 * @param object $post
	 */
	function ct_categories_meta_box_cb( $post, $box ) {
	$defaults = array('taxonomy' => 'category');
	if ( !isset($box['args']) || !is_array($box['args']) )
		$args = array();
	else
		$args = $box['args'];
	extract( wp_parse_args($args, $defaults), EXTR_SKIP );
	$tax = get_taxonomy($taxonomy);

	?>
	<div id="taxonomy-<?php echo $taxonomy; ?>" class="categorydiv">
		<ul id="<?php echo $taxonomy; ?>-tabs" class="category-tabs">
			<li class="tabs"><a href="#<?php echo $taxonomy; ?>-all"><?php echo $tax->labels->all_items; ?></a></li>
			<li class="hide-if-no-js"><a href="#<?php echo $taxonomy; ?>-pop"><?php _e( 'Most Used' ); ?></a></li>
		</ul>

		<div id="<?php echo $taxonomy; ?>-pop" class="tabs-panel" style="display: none;">
			<ul id="<?php echo $taxonomy; ?>checklist-pop" class="categorychecklist form-no-clear" >
				<?php $popular_ids = wp_popular_terms_checklist($taxonomy); ?>
			</ul>
		</div>

		<div id="<?php echo $taxonomy; ?>-all" class="tabs-panel">
			<?php
            $name = ( $taxonomy == 'category' ) ? 'post_category' : 'tax_input[' . $taxonomy . ']';
            echo "<input type='hidden' name='{$name}[]' value='0' />"; // Allows for an empty term set to be sent. 0 is an invalid Term ID and will be ignored by empty() checks.
            ?>
			<ul id="<?php echo $taxonomy; ?>checklist" data-wp-lists="list:<?php echo $taxonomy?>" class="categorychecklist form-no-clear">
				<?php wp_terms_checklist($post->ID, array( 'taxonomy' => $taxonomy, 'popular_cats' => $popular_ids ) ) ?>
			</ul>
		</div>
	<?php if ( current_user_can($tax->cap->edit_terms) ) : ?>
			<div id="<?php echo $taxonomy; ?>-adder" class="wp-hidden-children">
				<h4>
					<a id="<?php echo $taxonomy; ?>-add-toggle" href="#<?php echo $taxonomy; ?>-add" class="hide-if-no-js">
						<?php
							/* translators: %s: add new taxonomy label */
							printf( __( '+ %s' ), $tax->labels->add_new_item );
						?>
					</a>
				</h4>
				<p id="<?php echo $taxonomy; ?>-add" class="category-add wp-hidden-child">
					<label class="screen-reader-text" for="new<?php echo $taxonomy; ?>"><?php echo $tax->labels->add_new_item; ?></label>
					<input type="text" name="new<?php echo $taxonomy; ?>" id="new<?php echo $taxonomy; ?>" class="form-required form-input-tip" value="<?php echo esc_attr( $tax->labels->new_item_name ); ?>" aria-required="true"/>
					<label class="screen-reader-text" for="new<?php echo $taxonomy; ?>_parent">
						<?php echo $tax->labels->parent_item_colon; ?>
					</label>
					<?php wp_dropdown_categories( array( 'taxonomy' => $taxonomy, 'hide_empty' => 0, 'name' => 'new'.$taxonomy.'_parent', 'orderby' => 'name', 'hierarchical' => 1, 'show_option_none' => '&mdash; ' . $tax->labels->parent_item . ' &mdash;' ) ); ?>
					<input type="button" id="<?php echo $taxonomy; ?>-add-submit" data-wp-lists="add:<?php echo $taxonomy ?>checklist:<?php echo $taxonomy ?>-add" class="button category-add-submit" value="<?php echo esc_attr( $tax->labels->add_new_item ); ?>" />
					<?php wp_nonce_field( 'add-'.$taxonomy, '_ajax_nonce-add-'.$taxonomy, false ); ?>
					<span id="<?php echo $taxonomy; ?>-ajax-response"></span>
				</p>
			</div>
		<?php endif; ?>
	</div>
	<?php

}
	
	function register_post_type_metadata(array $meta_boxes){
		// register aff store metadata
		$fields = array(	
				array( 'id' => 'portfolio-style', 'name' => esc_html__('Style', 'cactus'), 'type' => 'select', 'options' => array( '' => esc_html__('Default', 'cactus'),'big-gallery' => esc_html__('Big gallery', 'cactus'), 'small-gallery' => esc_html__('Small gallery', 'cactus'), 'big-image' => esc_html__('Big Image', 'cactus'), 'small-image' => esc_html__('Image List', 'cactus')),'desc' => esc_html__('Select "Default" to use settings in Plugin Options', 'cactus'), 'repeatable' => false, 'multiple' => false),
				array( 'id' => 'portfolio-video_embed', 'name' => esc_html__('Video Embedded Code','cactus'), 'type' => 'textarea' , 'desc' => esc_html__('(available when Style is not "Image List") To use Video instead of images, enter Video Embedded Code here','cactus'), 'repeatable' => false, 'multiple' => false),
				);
			
		$meta_boxes[] = array(
			'title' => esc_html__('Layout Settings','cactus'),
			'pages' => 'ct_portfolio',
			'fields' => $fields,
			'priority' => 'high'
		);
		$tmr_criteria = $this->get_option('portfolio-metadata');
		  $tmr_criteria = $tmr_criteria?explode(",", $tmr_criteria):'';
		  if($tmr_criteria){
			  foreach($tmr_criteria as $criteria){
				  $meta_box_ct[] = array(
					  'id'          => 'portfolio_'.sanitize_title($criteria),
					  'name'       => $criteria,
					  'type'        => 'text',
					  'desc'		=>'',
					  'repeatable' => false,
					  'multiple' => false
				  );
			  }
			$meta_boxes[] = array(
				'title' => esc_html__('Custom Meta','cactus'),
				'pages' => 'ct_portfolio',
				'fields' => $meta_box_ct,
				'priority' => 'high'
			);
		  }
		return $meta_boxes;
	}
	function port_meta(){
		//option tree
	   $porthead_settings = array(
			  'id'        => 'porthead_settings',
			  'title'     => esc_html__('Heading Backrgound','cactus'),
			  'desc'      => '',
			  'pages'     => array( 'ct_portfolio' ),
			  'context'   => 'normal',
			  'priority'  => 'high',
			  'fields'    => array(
				  array(
						'id'          => 'port_header_background',
						'label'       => esc_html__('Header Background','cactus'),
						'desc'        => esc_html__('Choose background for this project. Overwrite setting in Portfolio Settings','cactus'),
						'std'         => '',
						'type'        => 'background'
				  ),
			   )
		  );
		  if (function_exists('ot_register_meta_box')) {
			ot_register_meta_box( $porthead_settings );
		  }
	}
	
}


} // class_exists check
/**
 * Init businesshub_channel
 */
$GLOBALS['businesshub_portfolio'] = new businesshub_portfolio();
?>
