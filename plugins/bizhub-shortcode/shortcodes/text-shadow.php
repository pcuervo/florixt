<?php
class CactusShortcodeTextShadow extends CactusShortcode {
	public function __construct( $attrs = null, $content = '' ) {
		parent::__construct('c_text_shadow', $attrs , $content);
	}
	
	public function parse_shortcode($atts, $content){
		$id 						= isset($atts['id']) ? $atts['id'] : '';
		$text_shadow_color			= (isset($atts['color']) && trim($atts['color'])!='') ? trim($atts['color']) : 'rgba(0,0,0,0.5)';
		$text_shadow_offset			= (isset($atts['offset']) && is_numeric(trim($atts['offset']))) ? trim($atts['offset']) : '1';

		ob_start();?>
			
		<div <?php echo ($id != '' ? ('id="' . $id  . '"') : '');?> class="cactus-text-shadow-wrap"><?php echo do_shortcode(str_replace('<br class="cactus_br" />', '', $content)); ?></div>

		<?php
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
	
	public function generate_inline_css($attrs = array()){
		
		$css_return = '';
					
		if(count($attrs) == 0) {
			$attrs = $this->attributes;
		};
		
		$this->id 	= $attrs['id'];
		
		$color= '';
		if(isset($attrs['color'])) {
			$color 		= $attrs['color'];
		}
		
		$offset='';
		if(isset($attrs['offset'])) {
			$offset 	= $attrs['offset'];
		}
		
		if($this->id == ''){
			$this->generate_id();
		}		

		if($color!='' || $offset!='') {
			$css_return .= '#'.$this->id.'.cactus-text-shadow-wrap{text-shadow:1px '.($offset!=''?$offset:'1').'px 2px '.($color!=''?$color:'rgba(0,0,0,0.5)').';}';
		}

		return $css_return;
	}
}

$shortcode_text_shadow = new CactusShortcodeTextShadow();

add_action( 'after_setup_theme', 'reg_businesshub_text_shadow' );
if(!function_exists('reg_businesshub_text_shadow')){
	function reg_businesshub_text_shadow(){
		if(function_exists('vc_map')){
			vc_map(array(
			   "name" 				=> esc_html__('Text Shadow', 'cactus'),
			   "base" 				=> "c_text_shadow",
			   'is_container' 		=> true,	
			   "icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_text_shadow.png",
			   "category" => esc_html__('Cactus Shortcodes', 'cactus'),		   			     
			   "params" 			=> array(
											array(
												 "type" => "colorpicker",
												 "heading" => esc_html__("Shadow Color", 'cactus'),
												 "param_name" => "color",
												 "value" => '',
											),	
											array(
												"type" => "textfield",
												"heading" => esc_html__("Shadow Offset", "cactus"),
												"param_name" => "offset",
												"description" => esc_html__("in pixels, ext: 1, 2, 3 ...", "cactus"),
											),				
										),
				"js_view" 			=> 'VcColumnView'
			));
		}
		
		if(class_exists('WPBakeryShortCode') && class_exists('WPBakeryShortCodesContainer')){
			class WPBakeryShortCode_c_text_shadow extends WPBakeryShortCodesContainer{}
		}
	}	
}