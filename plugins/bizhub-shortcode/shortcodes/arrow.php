<?php
class CactusShortcodeArrow extends CactusShortcode {
	public function __construct( $attrs = null, $content = '' ) {
		parent::__construct('c_arrow', $attrs , $content);
	}
	
	public function parse_shortcode($atts, $content){
		$id 			= isset($atts['id']) ? $atts['id'] : '';
		$arrow_width	= (isset($atts['width']) && is_numeric(trim($atts['width']))) ? trim($atts['width']) : '';
		$arrow_height	= (isset($atts['height']) && is_numeric(trim($atts['height']))) ? trim($atts['height']) : '';
		$arrow_color	= (isset($atts['color']) && trim($atts['color'])!='') ? trim($atts['color']) : '';
		
		
		//start
		ob_start();?>
			
		<div <?php echo ($id != '' ? ('id="' . $id  . '"') : '');?> class="ct-shortcode-arrow"></div>

		<?php
		//end
		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}
	
	public function generate_inline_css($attrs = array()){

		$css_return = '';
		$css_parent = '';
		$css_arrow = '';	
		
		$width = '';
		$height = '';
		$color = '';
		
		if(count($attrs) == 0) {
			$attrs = $this->attributes;
		}
		
		$this->id = $attrs['id'];
		
		if(isset($attrs['width'])) {
			$width 		= $attrs['width'];
		}
		
		if(isset($attrs['height'])) {
			$height 		= $attrs['height'];
		}
		
		if(isset($attrs['color'])) {
			$color 		= $attrs['color'];
		}
		
		if($width!='' ){
			$new_width = ((int)$width) / 2;
			$css_arrow .= 'border-left-width:'.$new_width.'px; border-right-width:'.$new_width.'px;margin-left:-'.$new_width.'px;';
		}	
		
		if($height!=''){
			$css_parent .='height:'.$height.'px;';
			$css_arrow .= 'border-top-width:'.$height.'px; border-bottom-width:'.$height.'px;';	
		}
		
		if($color!=''){
			$css_arrow .= 'border-top-color:'.$color.';';	
		}		
		
		if($this->id == ''){
			$this->generate_id();
		}
		
				
		if($css_parent!=''){
			$css_return .= '#'.$this->id.'.ct-shortcode-arrow{' . $css_parent . '}';
		}
		
		if($css_arrow!=''){
			$css_return .= '#'.$this->id.'.ct-shortcode-arrow:after{' . $css_arrow . '}';
		}

		return $css_return;
	}
}

$shortcode_arrow = new CactusShortcodeArrow();

if(!function_exists('reg_businesshub_arrow')){
	function reg_businesshub_arrow(){
		if(function_exists('vc_map')){
			vc_map(array(
			   "name" => esc_html__('Arrow', 'cactus'),
			   "base" => "c_arrow",
			   "class" => "",
			   "icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_arrow.png",
			   "controls" => "full",
			   "category" => esc_html__('Cactus Shortcodes', 'cactus'),
			   "params" => 	array(				
					array(
						"type" => "textfield",
						"heading" => esc_html__("Arrow Width", "cactus"),
						"param_name" => "width",
						"value" => "",
						"description" => esc_html__("in pixels, ext: 10, 20, 30", "cactus"),
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Arrow Height", "cactus"),
						"param_name" => "height",
						"value" => "",	
						"description" => esc_html__("in pixels, ext: 10, 20, 30", "cactus"),				
					),				
					array(
						 "type" => "colorpicker",
						 "class" => "",
						 "heading" => esc_html__("Arrow Color", 'cactus'),
						 "param_name" => "color",
						 "value" => '',
					),				
				)
			));
		}
	}	
}
add_action( 'after_setup_theme', 'reg_businesshub_arrow' );