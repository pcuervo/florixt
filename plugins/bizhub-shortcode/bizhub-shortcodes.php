<?php

/*
Plugin Name: Business-Hub Shortcodes
Plugin URI: http://www.cactusthemes.com/
Description: Enable shortcodes for Business-Hub
Version: 1.0.1
Author: CactusThemes
Author URI: http://cactusthemes.com/
License: Commercial
*/

/**
 * @package Bussiness-Hub
 * @version 1.0
 */

if ( ! defined( 'BUSINESSHUB_SHORTCODE_BASE_FILE' ) )
    define( 'BUSINESSHUB_SHORTCODE_BASE_FILE', __FILE__ );
if ( ! defined( 'BUSINESSHUB_SHORTCODE_BASE_DIR' ) )
    define( 'BUSINESSHUB_SHORTCODE_BASE_DIR', dirname( BUSINESSHUB_SHORTCODE_BASE_FILE ) );
if ( ! defined( 'BUSINESSHUB_SHORTCODE_PLUGIN_URL' ) )
    define( 'BUSINESSHUB_SHORTCODE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

if ( ! defined( 'BUSINESSHUB_SHORTCODE_VERSION' ) )
    define( 'BUSINESSHUB_SHORTCODE_VERSION', '1.0.0' );
if(!function_exists('sc_get_plugin_url')){
	function sc_get_plugin_url(){
		return plugin_dir_path(__FILE__);
	}
}
global $cactus_shortcodes;

/**
 * Sample shortcodes configuration
 *
 *

 $cactus_shortcodes = array(
	'name_of_shortcode'=>array(
					'path'			=> 'path/to/shortcode.php'
					,'classic_js'	=> 'path/to/script/in/classic/editor.js'
					,'class'		=> 'NameOfShortcodeClass'
					,'tag'			=> 'shortcode_tag'
					,'js'			=> array(
											'name-of-script'	=> array('path' => 'path/to/additional/script.js',
																		'dependencies' => array(),
																		'version' => '')
										)
					,'css'			=> array(
											'name-of-style'	=> array('path' => 'path/to/style.css')
										)
										)
					)

 *
 *
 */

$cactus_shortcodes = array(
	'cactus_tooltip'=>array(
					'path'			=> 'shortcodes/tooltip.php'
					,'classic_js'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL.'shortcodes/js/tooltip.js'
					,'tag'			=> 'c_tooltip'),
	'cactus_button'=>array(
					'path'			=> 'shortcodes/button.php'
					,'classic_js'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL.'shortcodes/js/button.js'
					,'class'		=> 'CactusShortcodeButton'
					,'tag'			=> 'c_button'
										),
	'cactus_blog'=>array(
					'path'			=> 'shortcodes/blog.php'
					,'classic_js'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL.'shortcodes/js/blog.js'
					,'tag'			=> 'c_blog'),
	'cactus_post_grid'=>array(
					'path'			=> 'shortcodes/post-grid.php'
					,'classic_js'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL.'shortcodes/js/post-grid.js'
					,'tag'			=> 'c_grid'),
	'cactus_member'=>array(
					'path'			=> 'shortcodes/member.php'
					,'classic_js'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL.'shortcodes/js/member.js'
					,'tag'			=> 'c_member'),
	'cactus_slider'=>array(
					'path'			=> 'shortcodes/slider.php'
					,'classic_js'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL.'shortcodes/js/slider.js'
					,'tag'			=> 'c_slider'),
	'cactus_counter'=>array(
					'path'			=> 'shortcodes/counter.php'
					,'classic_js'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL.'shortcodes/js/counter.js'
					,'tag'			=> 'c_counter'),
	'cactus_image_showcase'=>array(
					'path'			=> 'shortcodes/image-showcases.php'
					,'classic_js'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL.'shortcodes/js/image-showcases.js'
					,'tag'			=> 'c_image_showcases'),
	'cactus_story'=>array(
					'path'			=> 'shortcodes/story.php'
					,'classic_js'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL.'shortcodes/js/story.js'
					,'class'		=> 'CactusShortcodeStory'
					,'tag'			=> 'c_stories'),
	'cactus_testimonials'=>array(
					'path'			=> 'shortcodes/testimonials.php'
					,'classic_js'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL.'shortcodes/js/testimonials.js'
					,'tag'			=> 'c_testimonials'),
	'cactus_simple_showcases'=>array(
					'path'			=> 'shortcodes/simple-showcase.php'
					,'classic_js'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL.'shortcodes/js/simple-showcase.js'
					,'class'		=> 'CactusShortcodeSimpleShowcase'
					,'tag'			=> 'c_simple_showcase'),
	'cactus_banner'=>array(
					'path'			=> 'shortcodes/banner.php'
					,'classic_js'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL.'shortcodes/js/banner.js'
					,'class'		=> 'CactusShortcodeBanner'
					,'tag'			=> 'c_banner'),
	'cactus_schedule'=>array(
					'path'			=> 'shortcodes/schedule.php'
					,'classic_js'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL.'shortcodes/js/schedule.js'
					,'tag'			=> 'c_schedule'),
	'cactus_iconbox'=>array(
					'path'			=> 'shortcodes/icon-box.php'
					,'classic_js'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL.'shortcodes/js/icon-box.js'
					,'class'		=> 'CactusShortcodeIconBoxItem'
					,'tag'			=> 'c_iconbox_item'),
	'cactus_content_box'=>array(
					'path'			=> 'shortcodes/content-box.php'
					,'classic_js'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL.'shortcodes/js/content-box.js'
					,'tag'			=> 'c_contentbox'),
	'cactus_feature_showcases'=>array(
					'path'			=> 'shortcodes/feature-showcases.php'
					,'classic_js'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL.'shortcodes/js/feature-showcases.js'
					,'tag'			=> 'c_feature_showcases'),
	'cactus_compare_table'=>array(
					'path'			=> 'shortcodes/compare-table.php'
					,'classic_js'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL.'shortcodes/js/compare-table.js'
					,'class'		=> 'CactusShortcodeCompareTableColumn'
					,'tag'			=> 'c_column'),
	'cactus_arrow'=>array(
					'path'			=> 'shortcodes/arrow.php',
					'class'			=> 'CactusShortcodeArrow',
					'tag'			=> 'c_arrow'),
	'cactus_text_shadow'=>array(
					'path'			=> 'shortcodes/text-shadow.php',
					'classic_js'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL.'shortcodes/js/text-shadow.js',
					'class'			=> 'CactusShortcodeTextShadow',
					'tag'			=> 'c_text_shadow'),
	'cactus_font_icon'=>array(
					'path'			=> 'shortcodes/font-icon.php',
					'classic_js'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL.'shortcodes/js/font-icon.js',
					'tag'			=> 'c_icon'),
	'cactus_countdown_timer'=>array(
					'path'			=> 'shortcodes/countdown-timer.php',
					'classic_js'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL.'shortcodes/js/countdown-timer.js',
					'class'			=> 'CactusShortcodeCountdownTimer',
					'tag'			=> 'c_timer'),
	'cactus_heading'=>array(
					'path'			=> 'shortcodes/heading.php',
					'classic_js'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL.'shortcodes/js/heading.js',
					'tag'			=> 'c_heading',
					'class'			=> 'CactusShortcodeHeading',
					),					
	'cactus_parallax'=>array(
					'path'			=> 'shortcodes/parallax.php',
					'classic_js'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL.'shortcodes/js/parallax.js',
					'class'		=> 'CactusShortcodeParallaxSlide',
					'tag'			=> 'c_parallax_slide'),
	'cactus_shortcode_list'=>array(
					'classic_js'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL.'shortcodes/js/shortcode-list-button.js',
					),
	'cactus_partners'=>array(
					'path'			=> 'shortcodes/partner.php',
					'classic_js'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL.'shortcodes/js/partner.js',
					'tag'			=> 'c_partners'),												
);

include sc_get_plugin_url().'shortcodes/base_shortcode.php';

foreach($cactus_shortcodes as $name => $params ){
	if(isset($params['path']))
		include $params['path'];
}



/**
 * Base class to register shortcodes
 */
class businesshub_Shortcodes {

	function __construct()
	{
		add_action('init',array(&$this, 'init'));
		add_action( 'after_setup_theme', array(&$this, 'register_imagesizes') );
	}

	function init(){
		if(is_admin()){
			// CSS for button styling
			wp_enqueue_style("businesshub_shortcode_admin_style", BUSINESSHUB_SHORTCODE_PLUGIN_URL . '/shortcodes/css/style-admin.css');
			wp_enqueue_script('businesshub_shortcode_admin', BUSINESSHUB_SHORTCODE_PLUGIN_URL . 'assets/admin.js');

			add_action('save_post',array(&$this,'cactus_savepost_parse_shortcode_custom_css'));

			add_action( 'wp_ajax_ct_save_widget_text', array($this,'widget_text_save_callback' ));
			
			add_action( 'ot_after_theme_options_save', array($this,'ot_after_save'));
		}
		else
		{
			add_action( 'wp_enqueue_scripts', array($this, 'enqueue_styles') );
			add_action( 'wp_enqueue_scripts', array($this, 'enqueue_scripts') );

			add_action('wp_head',array(&$this,'cactus_shortcodes_wp_head'),101);
		}

		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
	    	return;
		}

		if ( get_user_option('rich_editing') == 'true' ) {
			add_filter( 'mce_external_plugins', array(&$this, 'register_classic_editor_plugins'));
			add_filter( 'mce_buttons_3', array(&$this, 'add_classic_editor_buttons') );

			// remove a button. Used to remove a button created by another plugin
			remove_filter('mce_buttons_3', array(&$this, 'remove_classic_editor_buttons'));
		}
	}

	//  process Theme Options data to check if there is any shortcode used
	function ot_after_save($options) {
		$clones = $options;
		$used_shortcodes = array();
		$global_css = '';
		foreach($options as $key => $val){
			if($key == 'archives_footer_cta_content'){

				$replacements = array();
				$css = $this->cactus_parse_inlinecss($val, $used_shortcodes, $replacements);

				if($css != ''){

					$new_val = $val;
					foreach($replacements as $replace){
						$new_val = str_replace($replace[0], $replace[1], $new_val);
					}

					$global_css .= ';' . $css;
					$clones[$key] = $new_val;
				}
			}
		}

		if(startsWith($global_css,';')){
			$global_css = substr($global_css,1);
		}

		$shortcodes = get_option('ct_shortcodes_used_in_ot');
		if(!isset($shortcodes) || !is_array($shortcodes)){
			add_option('ct_shortcodes_used_in_ot', array());
		}

		$shortcodes = $used_shortcodes;
		update_option('ct_shortcodes_used_in_ot', $shortcodes);


		// update global custom CSS in theme options, to be called in every pages
		$global_custom_css = get_option('ct_ot_custom_css');
		if(!isset($global_custom_css) || !is_array($global_custom_css)){
			add_option('ct_ot_custom_css', '');
		}

		$global_custom_css = $global_css;
		update_option('ct_ot_custom_css', $global_custom_css);

		update_option(ot_options_id(), $clones);

	}

	function enqueue_styles(){
		wp_enqueue_style('ct-shortcode-css', BUSINESSHUB_SHORTCODE_PLUGIN_URL . 'shortcodes/css/shortcode.css');

		/**
		 * register scripts
		 */
		global $cactus_shortcodes;
		foreach($cactus_shortcodes as $shortcode){
			if(isset($shortcode['css']) && count($shortcode['css']) > 0){
				foreach($shortcode['css'] as $css => $params){
					wp_register_style($css, $params['path']);
				}
			}
		}

		if(is_singular()){
			$id = get_the_ID();

			$shortcodes = get_post_meta($id,'_cactus_shortcodes', true);

			if(isset($shortcodes) && is_array($shortcodes) && count($shortcodes) > 0){

				foreach($shortcodes as $tag){

					$config = businesshub_get_shortcode_config($tag);

					if(isset($config['css']) && count($config['css']) > 0){
						foreach($config['css'] as $css => $params){
							wp_enqueue_style($css);
						}
					}
				}
			}
		}
	}

	function enqueue_scripts(){
		wp_enqueue_script( 'ct-shortcode-js',BUSINESSHUB_SHORTCODE_PLUGIN_URL . 'shortcodes/js/shortcode.js', array(), BUSINESSHUB_SHORTCODE_VERSION, true );

		/**
		 * register scripts
		 */
		global $cactus_shortcodes;
		foreach($cactus_shortcodes as $shortcode){
			if(isset($shortcode['js']) && count($shortcode['js']) > 0){
				foreach($shortcode['js'] as $js => $params){
					wp_register_script($js, $params['path'], isset($params['dependencies']) ? $params['dependencies'] : null, isset($params['version']) ? $params['version'] : '');
				}
			}
		}
	}
	

	/**
	 * hook to save_post to parse custom css
	 */
	function cactus_savepost_parse_shortcode_custom_css($post_id){
		$post = get_post( $post_id );

		$content = $post->post_content;

		$used_shortcodes = array();
		$replacements = array();
		$css = $this->cactus_parse_inlinecss($content, $used_shortcodes, $replacements);

		if ( empty( $css ) ) {
			delete_post_meta( $post_id, '_cactus_shortcodes_custom_css' );
		} else {
			update_post_meta( $post_id, '_cactus_shortcodes_custom_css', $css );
		}

		if (count($used_shortcodes) > 0){
			update_post_meta( $post_id, '_cactus_shortcodes', $used_shortcodes );
		} else {
			delete_post_meta( $post_id, '_cactus_shortcodes' );
		}
		
		
		foreach($replacements as $replace){
			$content = str_replace($replace[0], $replace[1], $content);
		}
		
		// to prevent losing data
		if($content != '')
			$post->post_content = $content;

		// unhook this function so it doesn't loop infinitely
		remove_action('save_post', array($this,'cactus_savepost_parse_shortcode_custom_css'));

		// update the post, which calls save_post again
		wp_update_post( $post );

		// re-hook this function
		add_action('save_post', array($this,'cactus_savepost_parse_shortcode_custom_css'));
	}

	/**
	 * extract inline css inside shortcode "css" attritube
	 */
	function cactus_parse_inlinecss($content, &$used_shortcodes, &$replacements){
		$css = '';
		// check is $content has any shortcode contain a parameter, which value is a CSS string, ex ".class{property:value}"

		preg_match_all( '/' . get_shortcode_regex() . '/', $content, $shortcodes );

		foreach ( $shortcodes[2] as $index => $tag ) {
			
			$shortcode = businesshub_get_shortcode_config( $tag );

			if($shortcode){
				
				$attr_array = shortcode_parse_atts( trim( $shortcodes[3][ $index ] ) );

				if(isset($shortcode['class'])){
					$the_class = $shortcode['class'];
					
					$the_obj = new $the_class($attr_array, $shortcodes[5][ $index ]);

					$new_css = $the_obj->generate_inline_css();
					
					$css .= $new_css;
					
					// replace the shortcode with new one (having generated id)
					$reg = array($tag . $shortcodes[3][$index], $tag . $the_obj->to_string(true));
					if($new_css != ''){
						array_push($replacements, $reg);
					}
				}
			}
		}

		// recursively parse inner content
		foreach ( $shortcodes[5] as $shortcode_content ) {
			$css .= $this->cactus_parse_inlinecss ( $shortcode_content, $used_shortcodes, $replacements );
		}

		return $css;
	}

	/**
	 * print out custom css of shortcodes into wp_head
	 */
	function cactus_shortcodes_wp_head(){
		// write out custom code for shortcodes
		if(is_singular()){
			$id = get_the_ID();

			$shortcodes = get_post_meta($id,'_cactus_shortcodes', true);

			if(isset($shortcodes) && is_array($shortcodes) && count($shortcodes) > 0){

				foreach($shortcodes as $tag){

					$config = businesshub_get_shortcode_config($tag);

					if(isset($config['js']) && count($config['js']) > 0){
						$idx = 1;
						foreach($config['js'] as $js => $params){

							wp_enqueue_script($js);
							$idx++;
						}
					}

					if(isset($config['css']) && count($config['css']) > 0){
						$idx = 1;
						foreach($config['css'] as $css => $params){
							wp_enqueue_style($css);
							$idx++;
						}
					}
				}
			}


			$css = get_post_meta($id,'_cactus_shortcodes_custom_css', true);

			if($css != ''){
				echo '<style type="text/css">' . $css . '</style>';
			}
		}

		// write global custom css
		$custom_css = '';
		$global_custom_css = get_option('ct_custom_css');

		if(isset($global_custom_css) && is_array($global_custom_css)){
			foreach($global_custom_css as $key => $css){
				// check if widget is active
				preg_match('/(.*)\[(.*)\]/', $key, $matches);
				// widget id_base
				$id_base = substr($matches[1], 7);

				if(is_active_widget(false, $id_base . '-' . $matches[2], $id_base, true)){
					$custom_css .= $css;
				}
			}
		}

		if($custom_css != ''){
			echo '<style type="text/css" id="ct_global_custom_css">' . $custom_css . '</style>';
		}

		// write custom css used in Theme Options
		$ot_custom_css = get_option('ct_ot_custom_css');

		if($ot_custom_css != ''){
			echo '<style type="text/css" id="ct_global_ot_custom_css">' . $ot_custom_css . '</style>';
		}

		// enqueue_scripts and enqueue_styles for shortcodes used in widget
		$shortcodes = get_option('ct_shortcodes_used_in_widgets');

		if(isset($shortcodes) && is_array($shortcodes)){
			foreach($shortcodes as $key => $tags){
				// check if widget is active
				preg_match('/(.*)\[(.*)\]/', $key, $matches);
				// widget id_base
				$id_base = substr($matches[1], 7);

				if(is_active_widget(false, $id_base . '-' . $matches[2], $id_base, true)){
					foreach($tags as $tag){
						$config = businesshub_get_shortcode_config($tag);

						if(isset($config['js']) && count($config['js']) > 0){

							foreach($config['js'] as $js => $params){
								wp_enqueue_script($js);
							}
						}

						if(isset($config['css']) && count($config['css']) > 0){

							foreach($config['css'] as $css => $params){
								wp_enqueue_style($css);
							}
						}
					}
				}
			}
		}

		// enqueue_scripts and enqueue_styles for shortcodes used in theme options
		$shortcodes = get_option('ct_shortcodes_used_in_ot');

		if(isset($shortcodes) && is_array($shortcodes) && isset($tag)){

			foreach($shortcodes as $tags){
				$config = businesshub_get_shortcode_config($tag);

				if(isset($config['js']) && count($config['js']) > 0){

					foreach($config['js'] as $js => $params){
						wp_enqueue_script($js);
					}
				}

				if(isset($config['css']) && count($config['css']) > 0){

					foreach($config['css'] as $css => $params){
						wp_enqueue_style($css);
					}
				}
			}
		}
	}

	function register_classic_editor_plugins($plgs){
		global $cactus_shortcodes;
		foreach($cactus_shortcodes as $name => $params ){
			if(isset($params['classic_js']))
				$plgs[$name] = $params['classic_js'];
		}

		return $plgs;
	}


	/**
	 * remove a button from Classic Editor
	 */
	function remove_classic_editor_buttons($btns){
		// add a button to remove
		// array_push($btns, 'ct_shortcode');
		return $btns;
	}

	function add_classic_editor_buttons($btns){
		global $cactus_shortcodes;
		foreach($cactus_shortcodes as $name => $params ){
			if(isset($params['classic_js']))
				array_push($btns, $name);
		}
		return $btns;
	}

	/**
	 * register new image sizes to use in shortcodes here
	 *
	 */
	function register_imagesizes(){
		global $businesshub_size_array; // defined in CactusThemes's theme
		if(!$businesshub_size_array) $businesshub_size_array = array();

		/**
		 * register new sizes
		 */
		$businesshub_size_array_shortcode = array(
			//post-grid
			'businesshub_thumb_460x460' => array(460, 460, true, array('businesshub_thumb_460x460','businesshub_thumb_460x460','businesshub_thumb_460x460','businesshub_thumb_920x920')),//
			
			//retina
			'businesshub_thumb_920x920' => array(920, 920, true),
			);

		$businesshub_size_array = array_merge($businesshub_size_array, $businesshub_size_array_shortcode);

		/**
		 * action cactus_reg_thumbnail - defined in theme
		 */
		do_action( 'businesshub_reg_thumbnail', $businesshub_size_array);
	}

	/**
	 * Ajax function to be called when a widget is saved
	 */
	function widget_text_save_callback() {
		global $wpdb;

		$data = $_POST['data'];

		$vals = explode('&', $data);

		foreach($vals as $item){
			$arr = explode('=', $item);
			$key = urldecode($arr[0]);
			$val = urldecode($arr[1]);
			if(endsWith($key, '[text]')) {
				// so this a Text Widget submission, continue to process
				
				$used_shortcodes = array();
				$replacements = array();
				$css = $this->cactus_parse_inlinecss($val, $used_shortcodes, $replacements);
				
				file_put_contents(dirname(__FILE__) . '/log.txt',$css, FILE_APPEND);
				if($css != ''){
					$new_val = $val;
					
					foreach($replacements as $replace){
						$new_val = str_replace($replace[0], $replace[1], $new_val);
					}
					
					$widget = str_replace('[text]', '', $key);

					// update global custom CSS, to be called in every pages
					$global_custom_css = get_option('ct_custom_css');
					if(!isset($global_custom_css) || !is_array($global_custom_css)){
						$global_custom_css = array();
						add_option('ct_custom_css', $global_custom_css);
					}

					$global_custom_css[$widget] = $css;
					update_option('ct_custom_css', $global_custom_css);

					$shortcodes = get_option('ct_shortcodes_used_in_widgets');
					if(!isset($shortcodes) || !is_array($shortcodes)){
						$shortcodes = array();
						add_option('ct_shortcodes_used_in_widgets', $shortcodes);
					}
					$shortcodes[$widget] = $used_shortcodes;
					update_option('ct_shortcodes_used_in_widgets', $shortcodes);

					preg_match('/(.*)\[(.*)\]/', $widget, $matches);
					$id_base = substr($matches[1], 7);

					$widget_options = get_option('widget_' . $id_base);

					$widget_options[$matches[2]]['text'] = $new_val;

					update_option('widget_' . $id_base, $widget_options);

					// do this silently. So echo empty;
					break;
				}
			}
		}

		wp_die(); // this is required to terminate immediately and return a proper response
	}
}

$businesshub_shortcodes = new businesshub_Shortcodes();

/**
 * this function must be called if inner shortcode is used
 *
 * For example:
 * [parent][child][/child][parent]
 *
 */
function businesshub_remove_wpautop( $content, $autop = false ) {

	if ( $autop ) {
		$content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
	}

	return do_shortcode( shortcode_unautop( $content ) );
}

/**
 * Remove unwanted empty <p>
 */
add_filter( 'the_content', 'businesshub_remove_unwanted_p', 11 );
function businesshub_remove_unwanted_p( $content = null ) {
	if ( $content ) {
		$s = array(
			'/' . preg_quote( '</div>', '/' ) . '[\s\n\f]*' . preg_quote( '</p>', '/' ) . '/i',
			'/' . preg_quote( '<p>', '/' ) . '[\s\n\f]*' . preg_quote( '<div ', '/' ) . '/i',
			'/' . preg_quote( '<p>', '/' ) . '[\s\n\f]*' . preg_quote( '<section ', '/' ) . '/i',
			'/' . preg_quote( '</section>', '/' ) . '[\s\n\f]*' . preg_quote( '</p>', '/' ) . '/i'
		);
		$r = array( "</div>", "<div ", "<section ", "</section>" );
		$content = preg_replace( $s, $r, $content );

		return $content;
	}

	return null;
}

/**
 * return configuration declaration of a cactus-shortcode
 */
function businesshub_get_shortcode_config($tag){
	global $cactus_shortcodes;
	foreach($cactus_shortcodes as $name => $params ){
		if(isset($params['tag'])){
			if( $tag == $params['tag'] ){
				return $params;
			}
		}
	}	
	return null;
}
/**
 * query shortcode
 */
if(!function_exists('businesshub_shortcode_query')){
	function businesshub_shortcode_query($post_type='post',$cat='',$tag='',$ids='',$count='',$order='',$orderby='',$meta_key='',$texonomy='',$custom_args=''){
		$args = array();
		if($custom_args!=''){ //custom array
			$args = $custom_args;
		}elseif($ids!=''){ //specify IDs
			$ids = explode(",", $ids);
			$args = array(
				'post_type' => $post_type,
				'posts_per_page' => $count,
				'order' => $order,
				'orderby' => $orderby,
				'meta_key' => $meta_key,
				'post__in' => $ids,
				'ignore_sticky_posts' => 1,
			);
		}elseif($ids==''){
			$args = array(
				'post_type' => $post_type,
				'posts_per_page' => $count,
				'order' => $order,
				'orderby' => $orderby,
				//'meta_key' => $meta_key,
				'ignore_sticky_posts' => 1,
			);
			if($texonomy!=''){
				if(!is_array($cat) && $cat!='') {
					$cats = explode(",",$cat);
					if(is_numeric($cats[0])){
						$args['tax_query'] = array(
							array(
								'taxonomy' => $texonomy,
								'field'    => 'id',
								'terms'    => $cats,
								'operator' => 'IN',
							)
						);
					}else{
						$args['tax_query'] = array(
							array(
								'taxonomy' => $texonomy,
								'field'    => 'slug',
								'terms'    => $cats,
								'operator' => 'IN',
							)
						);
					}
				}elseif(count($cat) > 0 && $cat!=''){
					$args['tax_query'] = array(
						array(
							'taxonomy' => $texonomy,
							'field'    => 'id',
							'terms'    => $cat,
							'operator' => 'IN',
						)
					);
				}
				//tag
				if($tag) {
					$tags = explode(",",$tag);
					$args['tax_query'][] = array(
						'taxonomy' => $texonomy,
						'field'    => 'slug',
						'terms'    => $tags,
						'operator' => 'IN',
					);
				}
			}else{
				if(!is_array($cat)) {
					$cats = explode(",",$cat);
					if(is_numeric($cats[0])){
						$args['category__in'] = $cats;
					}else{
						$args['category_name'] = $cat;
					}
				}elseif(count($cat) > 0){
					$args['category__in'] = $cat;
				}
				$args['tag'] = $tag;
			}
			$time_now =  strtotime("now");
			$args += array(
			'meta_key' => $meta_key
			);
		}
		$args['post_status'] = $post_type=='attachment'?'inherit':'publish';
		$args['suppress_filters'] = 0;
		$shortcode_query = new WP_Query($args);
		return $shortcode_query;
	}
}

if(!function_exists('startsWith')){
	function startsWith($haystack, $needle) {
		// search backwards starting from haystack length characters from the end
		return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
	}
}

if(!function_exists('endsWith')){
	function endsWith($haystack, $needle) {
		// search forward starting from end minus needle length characters
		return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
	}
}
