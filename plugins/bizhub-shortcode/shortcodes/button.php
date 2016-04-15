<?php

class CactusShortcodeButton extends CactusShortcode {
	public function __construct( $attrs = null, $content = '' ) {
		parent::__construct('c_button', $attrs , $content);
	}
	
	public function parse_shortcode($atts, $content){
		$id 			= isset($atts['id']) ? $atts['id'] : '';
		$url 			= isset($atts['url']) ? $atts['url'] : '#';
		$url_target 	= isset($atts['url_target']) ? $atts['url_target'] : '0';
		$icon 			= isset($atts['icon']) ? $atts['icon'] : '';
		$style 			= isset($atts['style']) ? $atts['style'] : '1';
		$text_color 	= isset($atts['text_color']) ? $atts['text_color'] : 'rgba(255,255,255,1.0)';
		$bg_color 		= isset($atts['bg_color']) ? $atts['bg_color'] : '';
		if($url_target == 1){
			$url_target = '_blank';		
		}
		
		
		if($style != '1' && $style != '2' && $style != '3' && $style != '4'){
			$style = '1';
		}
		
		/*button style*/
		$btn_style_class = '';
		if($style == '1' && $icon !=''){
			$btn_style_class = ' btn-style-1 ';
		}elseif($style == '2'){
			$btn_style_class = ' btn-style-1 btn-style-2 ';		
		}elseif($style == '3'){
			$btn_style_class = ' btn-style-1 btn-style-3 ';		
		}elseif($style == '4'){
			$btn_style_class = ' btn-style-1 btn-style-2 btn-style-4 ';		
		}
		/*button style*/
		
		//start
		ob_start();?>
		<?php if(isset($content) && $content != '' ) :?>	
		<a <?php echo ($id != '' ? ('id="' . $id  . '"') : '');?> href="<?php echo $url != '' ? $url : '#'; ?>" <?php echo $url_target != '0' ? 'target="'.$url_target.'"' : ''; ?> class="btn btn-default <?php echo $btn_style_class != '' ? $btn_style_class : ''; ?> ">
			<span class="add-style">
				<?php echo $icon != '' ? ('<span class="'.$icon.'"></span>') : ''; ?> 
				<?php echo $content != '' ? ('<span>'.$content.'</span>') : ''; ?>
			</span>    
		</a>
		<?php endif;?>
        
		<?php
		//end
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
	
	public function generate_inline_css($attrs = array()){
		$css = '';
		
		if(count($attrs) == 0) $attrs = $this->attributes;	
		
		foreach($attrs as $att => $val){
			switch($att){
				case 'text_color':
					if($attrs['text_color'] != '' ){
						$css .= 'color:' . $val . ';';
					}
					break;
				case 'bg_color':
					if($attrs['style'] == '3' && $attrs['bg_color'] != ''){
						$css .= 'border-color:' . $val . ';';
						break;
					}else{
						if($attrs['bg_color'] != '' ){
							$css .= 'background-color:' . $val . ';';
						}
						break;
					}
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
			$css = '#' . $this->id . '.btn.btn-default:not(:hover){' . $css . '}';
		}

		return $css;
	}
}

$shortcode_button = new CactusShortcodeButton();

/** 
 * add button to visual composer
 */
add_action( 'after_setup_theme', 'reg_businesshub_button' );
function reg_businesshub_button(){
    if(function_exists('vc_map')){
	vc_map(array(
		   "name" => esc_html__("Button",'cactus'),
		   "base" => "c_button",
		   "class" => "",
		   "icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_button.png",
		   "controls" => "full",
		   "category" => esc_html__('Cactus Shortcodes', 'cactus'),
		   "params" => 	array(
				array(
					"admin_label" => true,
					"type" => "textfield",
					"heading" => esc_html__("Button Text", "cactus"),
					"param_name" => "content",
					"value" => "",
					"description" => "",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("URL", "cactus"),
					"param_name" => "url",
					"value" => "",
					"description" => esc_html__("Target URL","cactus"),
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"heading" => esc_html__("Open URL in", "cactus"),
					"param_name" => "url_target",
					"value" => array(
						esc_html__("Curent Tab","cactus")=>'0',
						esc_html__("New Tab","cactus")=>'1',
					),
					"description" => "",
					"std" => "0",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Icon", "cactus"),
					"param_name" => "icon",
					"value" => "",
					"description" => esc_html__("Icon class, for example 'fa fa-home'","cactus"),
				),
				array(
					"admin_label" => true,
					 "type" => "dropdown",
					 "class" => "",
					 "heading" => esc_html__("Style", "cactus"),
					 "param_name" => "style",
					 "value" => array(
								esc_html__('Style 1 - big button, solid background with left separator.', 'cactus') => '1',
								esc_html__('Style 2 - big button, solid  background without separator.', 'cactus') => '2',
								esc_html__('Style 3 - big button, bordered.', 'cactus') => '3',
								esc_html__('Style 4 - small button', 'cactus') => '4',
								),
					 "description" => esc_html__("Select between 4 styles.","cactus"),
					 "std" => '1',
				),
				array(
					 "type" => "colorpicker",
					 "class" => "",
					 "heading" => esc_html__("Text Color", 'cactus'),
					 "param_name" => "text_color",
					 "value" => '',
					 "description" => esc_html__("Hexa color of text","cactus"),
			  	),
				array(
					 "type" => "colorpicker",
					 "class" => "",
					 "heading" => esc_html__("Background Color", 'cactus'),
					 "param_name" => "bg_color",
					 "value" => '',
					 "description" => esc_html__("Hexa color of background. In style 3, it is border color","cactus"),
			  	)
			)
		));
    }
}