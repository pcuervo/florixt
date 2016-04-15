<?php

/*
Plugin Name: Cactus Job
Description: Job Custom Post Type and Job-related features
Author: CactusThemes
Version: 1.0
Author URI: http://cactusthemes.com
*/

/**
 * @package Business-Hub
 * @version 1.0
 */

/*translate settings*/
$businesshub_text_translate = esc_html__('General','cactus').esc_html__('Job slug','cactus').esc_html__('Change single Job slug. Remember to save the permalink settings again in Settings > Permalinks','cactus').esc_html__('Jobs Listing','cactus').esc_html__('Listing Page','cactus').esc_html__('Assign Jobs Listing page to a page. Remember to save the permalink settings again in Settings > Permalinks','cactus').esc_html__('Post Per Page','cactus').esc_html__('Number of posts per page in Job Listing page','cactus').esc_html__('Job Footer CTA content','cactus').esc_html__('Footer CTA Content for all Job pages','cactus').esc_html__('Single Job','cactus').esc_html__('Sidebar','cactus').esc_html__('Right','cactus').esc_html__('Left','cactus').esc_html__('Hidden','cactus').esc_html__('Heading Background','cactus').esc_html__('Background Image','cactus').esc_html__('Background Color','cactus').esc_html__('Background Repeat','cactus').esc_html__('No repeat','cactus').esc_html__('Repeat','cactus').esc_html__('Repeat Horizontally','cactus').esc_html__('Repeat Vertically','cactus').esc_html__('Inherit','cactus').esc_html__('Background Position','cactus').esc_html__('Left Top','cactus').esc_html__('Left Center','cactus').esc_html__('Left Bottom','cactus').esc_html__('Center Top','cactus').esc_html__('Center Center','cactus').esc_html__('Center Bottom','cactus').esc_html__('Right Top','cactus').esc_html__('Right Center','cactus').esc_html__('Right Bottom','cactus').esc_html__('Background Size','cactus');

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if(!function_exists('job_get_plugin_url')){
	function job_get_plugin_url(){
		return plugin_dir_path(__FILE__);
	}
}
include job_get_plugin_url().'widget/job-listing.php';
include job_get_plugin_url().'shortcode/shortcode-job.php';
if(!class_exists('ct_job')){
class businesshub_job{
	/* custom template relative url in theme, default is "ct_portfolio" */
	public $template_url;
	/* Plugin path */
	public $plugin_path;

	/* Main query */
	public $query;

	public function __construct() {
		// constructor
		$this->includes();
		//$this->register_configuration();

		add_action( 'init', array($this,'init'), 0);
		add_action( 'admin_init', array( $this, 'header_bg_meta' ) );	
		add_action( 'template_redirect', array($this,'ct_stop_redirect'), 0);
		add_action( 'after_setup_theme', array(&$this, 'register_bt') );
		add_action( 'after_setup_theme', array(&$this, 'register_configuration') );
	}
	function register_bt(){
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
	    	return;
		}
		if ( get_user_option('rich_editing') == 'true' ) {
			add_filter( 'mce_external_plugins', array(&$this, 'reg_plugin'));
			add_filter( 'mce_buttons_3', array(&$this, 'reg_btn') );
		}
	}
	function reg_btn($buttons)
	{
		array_push($buttons, 'shortcode_jobs');
		return $buttons;
	}

	function reg_plugin($plgs)
	{
		$plgs['shortcode_jobs'] 		= plugins_url('shortcode/js/shortcode-job.js', __FILE__);
		return $plgs;
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
			wp_enqueue_style('admin-job-css',plugins_url('/css/admin-css.css', __FILE__));
	}

	function includes(){
		// custom meta boxes
		include_once job_get_plugin_url().'cactus-functions.php';
		if(!function_exists('cmb_init')){
			if(!class_exists('CMB_Meta_Box')){
				include_once job_get_plugin_url().'includes/Custom-Meta-Boxes-master/custom-meta-boxes.php';
			}
		}
		if(!class_exists('Options_Page')){
			include_once job_get_plugin_url().'includes/options-page/options-page.php';
		}
		//include_once('classes/u-project-query.php');
	}

	/* This is called as soon as possible to set up options page for the plugin
	 * after that, $this->get_option($name) can be called to get options.
	 *
	 */
	function register_configuration(){
		global $ct_job_settings;
		$ct_job_settings = new Options_Page('ct_job_settings', array('option_file'=>dirname(__FILE__) . '/options.xml','menu_title'=>__('Job Settings','cactus'),'menu_position'=>null), array('page_title'=>__('Job Setting','cactus'),'submit_text'=>__('Save','cactus')));
	}

	/* Get main options of the plugin. If there are any sub options page, pass Options Page Id to the second args
	 *
	 *
	 */
	function get_option($option_name, $op_id = ''){
		return $GLOBALS[$op_id != ''?$op_id:'ct_job_settings']->get($option_name);
	}

	function init(){
		// Variables
		$this->register_taxonomies();
		$this->template_url			= apply_filters( 'ct_job_template_url', 'cactus-job/' );
		add_filter( 'cmb_meta_boxes', array($this,'register_post_type_metadata') );
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
		$find = array('cactus-job.php');
		$file = '';
		$slug_lis = '';
		$slug_lis =  $this->get_option('job-listing-page');
		if(!is_numeric($slug_lis)){
			$slug_lis = 'jobs';
		}
		if(is_post_type_archive( 'ct_job' ) || is_page($slug_lis) || is_tax('job_cat')){
			$file = 'job-listing.php';
			$find[] = $file;
			$find[] = $this->template_url . $file;
		}
		elseif(is_singular('ct_job')){
			$file = 'single-job.php';
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
		$slug_cn =  op_get('ct_job_settings','job-slug');
		if(is_numeric($slug_cn)){
			$slug_cn = get_post($slug_cn);
			$slug_cn = $slug_cn->post_name;
		}
		if($slug_cn==''){
			$slug_cn = 'job';
		}
		// When default permalinks are enabled, redirect stores page to post type archive url
		if ( ! empty( $_GET['page_id'] ) && get_option( 'permalink_structure' ) == "" && $_GET['page_id'] ==  $slug_cn) {
			wp_safe_redirect( get_post_type_archive_link('ct_job') );
			exit;
		}
	}
	function register_taxonomies(){
		$this->register_ct_channel();
	}

	/* Register ct_channel post type and its custom taxonomies */
	function register_ct_channel(){
		$labels = array(
			'name'               => __('Job', 'cactus'),
			'singular_name'      => __('Job', 'cactus'),
			'add_new'            => __('Add New Job', 'cactus'),
			'add_new_item'       => __('Add New Job', 'cactus'),
			'edit_item'          => __('Edit Job', 'cactus'),
			'new_item'           => __('New Job', 'cactus'),
			'all_items'          => __('All Jobs', 'cactus'),
			'view_item'          => __('View Job', 'cactus'),
			'search_items'       => __('Search Job', 'cactus'),
			'not_found'          => __('No Job found', 'cactus'),
			'not_found_in_trash' => __('No Job found in Trash', 'cactus'),
			'parent_item_colon'  => '',
			'menu_name'          => __('Jobs', 'cactus'),
		  );
		$slug_cn =  op_get('ct_job_settings','job-slug');
		if(is_numeric($slug_cn)){
			$slug_cn = get_post($slug_cn);
			$slug_cn = $slug_cn->post_name;
		}
		if($slug_cn==''){
			$slug_cn = 'job';
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
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt')
		  );
		register_post_type( 'ct_job', $args );
		$ct_cat_labels = array(
			'name'=>'Job Categories',
			'singular_name'=>'Job Category'
		);
		register_taxonomy('job_cat', 'ct_job', array('labels'=>$ct_cat_labels,'show_admin_column'=>true,'hierarchical'=>true,'rewrite'=>array('slug'=>''),'meta_box_cb'=>array($this,'ct_categories_meta_box_cb')));
	}
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

	/* Register meta box for Store Type
	 * Wordpress 3.8
	 */
	function register_post_type_metadata(array $meta_boxes){
		// register aff store metadata
		$fields = array(
				array( 'id' => 'job_sidebar', 'name' => esc_html__('Sidebar', 'cactus'), 'type' => 'select', 'options' => array( '' => esc_html__('Default', 'cactus'), 'left' => esc_html__('Left', 'cactus'), 'right' => esc_html__('Right', 'cactus'), 'full' => esc_html__('Hidden', 'cactus')),'desc' => esc_html__('Select "Default" to use settings in Plugin Options', 'cactus'), 'repeatable' => false, 'multiple' => false),
				array( 'id' => 'job-location', 'name' => esc_html__('Location','cactus'), 'type' => 'textarea' , 'desc' => '', 'repeatable' => false, 'multiple' => false),
				array( 'id' => 'job-apply-url', 'name' => esc_html__('Apply URL','cactus'), 'type' => 'text' , 'desc' => esc_html__('Url for Apply button.','cactus'), 'repeatable' => false, 'multiple' => false),
				array( 'id' => 'job-expired', 'name' => esc_html__('Expired Date','cactus'), 'type' => 'date' , 'desc' => esc_html__('If empty, Job has no expired date.','cactus'), 'repeatable' => false, 'multiple' => false),
				);
		$meta_boxes[] = array(
			'title' => esc_html__('Job Settings','cactus'),
			'pages' => 'ct_job',
			'fields' => $fields,
			'priority' => 'high'
		);
		return $meta_boxes;
	}
	//bg meta
	function header_bg_meta(){
		//option tree
		  $header_meta_boxes = array(
				'id'        => 'header_bg_meta',
				'title'     => esc_html__('Header settings','cactus'),
				'desc'      => '',
				'pages'     => array( 'ct_job' ),
				'context'   => 'normal',
				'priority'  => 'high',
				'fields'    => array(
					array(
						  'id'          => 'post_meta_header_background',
						  'label'       => esc_html__('Background','cactus'),
						  'desc'        => esc_html__('Choose background for this post. Overwrite setting in Job Settings','cactus'),
						  'std'         => '',
						  'type'        => 'background'
					),
				 )
			);
		  if (function_exists('ot_register_meta_box')) {
			ot_register_meta_box( $header_meta_boxes );
		  }
	}

}

} // class_exists check
/**
 * Init businesshub_channel
 */
$GLOBALS['businesshub_job'] = new businesshub_job();
?>