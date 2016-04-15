<?php

function businesshub_simple_showcase($atts, $content){
	$parent_id = 'showcases_'.rand(1, 9999);;
	//start
	ob_start();?>
		
	<div <?php echo ($parent_id != '' ? ('id="' . $parent_id  . '"') : '');?> class="cactus-simple-showcase-group">
		<div class="ss-table">
			<div class="ss-row">
				<?php echo do_shortcode(str_replace('<br class="cactus_br" />', '', $content)); ?>
			</div>
		</div>
	</div>

	<?php
	//end
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}	

class CactusShortcodesimpleShowcase extends CactusShortcode {
	public function __construct( $attrs = null, $content = '' ) {
		parent::__construct('c_simple_showcase', $attrs , $content);
	}
	
	public function parse_shortcode($atts, $content){
		$title 				= isset($atts['title']) ? $atts['title'] : '';
		$title_color 		= isset($atts['title_color']) ? $atts['title_color'] : '';
		$content_color 		= isset($atts['content_color']) ? $atts['content_color'] : '';
		$background_color 	= isset($atts['background_color']) ? $atts['background_color'] : '';
		$background_image 	= isset($atts['background_image']) ? $atts['background_image'] : '';
		$id 				= isset($atts['id']) ? $atts['id'] : '';
		
		//start
		ob_start();?>
			
		<div <?php echo ($id != '' ? ('id="' . $id  . '"') : '');?> class="ss-td">
            <div class="ss-td-content">
            	<?php echo $title != '' ? ('<h4 class="ss-title">'.$title.'</h4>') : ''; ?>
                <div class="ss-excerpt"><?php echo do_shortcode(businesshub_remove_wpautop($content, true));?></div>
            </div>
        </div>

		<?php
		//end
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}	
	public function generate_inline_css($attrs = array()){
		
		$css = '';
		$css_title = '';
		$css_content = '';
		
		if(count($attrs) == 0) $attrs = $this->attributes;	
		
		foreach($attrs as $att => $val){
			switch($att){
				case 'background_color':
					if($attrs['background_color'] != '' ){
						$css .= 'background-color:' . $val . ';';
					}
					break;
				case 'background_image':
					if($attrs['background_image'] != '' ){
						if(is_numeric($val)){
							$image  = wp_get_attachment_image_src($val, "full");
							$bg_img 	= $image[0];
						}else{
							$bg_img = $val;	
						}
						$css .= 'background:url('.$bg_img.') no-repeat center; background-size: cover;';
					}
					break;
				case 'title_color':
					if($attrs['title_color'] != '' ){
						$css_title .= 'color:' . $val . ';';
					}
					break;
				case 'content_color':
					if($attrs['content_color'] != '' ){
						$css_content .= 'color:' . $val . ';';
					}
					break;
				case 'id':
					$this->id = $val;
					break;	
				default:
					break;
			}
		}
		
		if($this->id == ''){
			$this->generate_id();
		}
		
		if($css != ''){
			$css = '#' . $this->id . '.ss-td{' . $css . '}';
		}
		
		if($css_title != ''){
			$css_title = '#' . $this->id . '.ss-td .ss-title{' . $css_title . '}';
			$css .= $css_title;
		}
		
		if($css_content != ''){
			$css_content = '#' . $this->id . '.ss-td .ss-excerpt{' . $css_content . '}';
			$css .= $css_content;
		}
		
		return $css;
	}
}

$shortcode_simple_showcase = new CactusShortcodesimpleShowcase();
add_shortcode( 'c_simple_showcases', 'businesshub_simple_showcase' );

/** 
 * add button to visual composer
 */
add_action( 'after_setup_theme', 'reg_c_simple_showcases' );
function reg_c_simple_showcases(){
    if(function_exists('vc_map')){
		vc_map( array(
				   "name" => esc_html__("Simple Showcase", 'cactus'),
				   "base" => "c_simple_showcases",
				   "content_element" => true,
				   "as_parent" => array('only' => 'c_simple_showcase'),
				   "icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_simple_showcases.png",
				   "category" => esc_html__('Cactus Shortcodes', 'cactus'),
				   "show_settings_on_create" => false,
				   "params" => 	array(
				   ),
				   "js_view" => 'VcColumnView'
				)
		);
		vc_map( array(
					"name" => esc_html__("Simple Showcase Item", "cactus"),
					"base" => "c_simple_showcase",
					"content_element" => true,
					"as_child" => array('only' => 'c_simple_showcases'), // Use only|except attributes to limit parent (separate multiple values with comma)
					"icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_simple_showcase.png",
					"params" => array(
						array(
							"admin_label" => true,
							"type" => "textfield",
							"heading" => esc_html__("Title", "cactus"),
							"param_name" => "title",
							"value" => "",
							"description" => esc_html__("Title of item","cactus"),
						),
						array(
							"type" => "colorpicker",
							"heading" => esc_html__("Title Color", "cactus"),
							"param_name" => "title_color",
							"value" => "",
							"description" => esc_html__("hexa/rgba -(optional) color of title","cactus"),
						),
						array(
							"type" => "colorpicker",
							"heading" => esc_html__("Background Color", "cactus"),
							"param_name" => "background_color",
							"value" => "",
							"description" => esc_html__("Background color of item (hexa/rgba)","cactus"),
						),
						array(
							"type" => "attach_image",
							"heading" => esc_html__("Background Image", "cactus"),
							"param_name" => "background_image",
							"value" => "",
							"description" => esc_html__("Background Item - ID of image attachment or full URL of image","cactus"),
						),
						array(
							"type" => "textarea_html",
							"heading" => esc_html__("Content", "cactus"),
							"param_name" => "content",
							"value" => "",
						),
						array(
							"type" => "colorpicker",
							"heading" => esc_html__("content Color", "cactus"),
							"param_name" => "content_color",
							"value" => "",
							"description" => esc_html__("hexa/rgba -(optional) color of content","cactus"),
						),
					),
					 "js_view" => 'VcColumnView'
				)
		);
    }
	if(class_exists('WPBakeryShortCode') && class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_c_simple_showcases extends WPBakeryShortCodesContainer{}
		class WPBakeryShortCode_c_simple_showcase extends WPBakeryShortCodesContainer{}
	}

}