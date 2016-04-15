<?php
class CactusShortcodeHeading extends CactusShortcode {
	public function __construct( $attrs = null, $content = '' ) {
		parent::__construct('c_heading', $attrs , $content);
	}
	
	public function parse_shortcode($atts, $content){
		$id 			= isset($atts['id']) ? $atts['id'] : '';
		$style 			= isset($atts['style']) ? $atts['style'] : '1';
		$icon 			= isset($atts['icon']) ? $atts['icon'] : '';
		$sub_line		= isset($atts['sub_line']) ? $atts['sub_line'] : '';
		
		if($style != '1' && $style != '2' && $style != '3' && $style != '4' && $style != '5'){
			$style = '1';
		}
		
		if($icon){
			$class_str 		= $icon;
			$class_substr 	= substr($class_str,0,2);
		}
		
		$heading_class = '';
		switch($style) {
			case '1':
				if(!$icon){
					$heading_class = 'ct-s3';
				}else{
					$heading_class = 'ct-s1';
				}
				break;
			case '2':
					$heading_class = 'ct-s2';
				break;
			case '3':
					$heading_class = 'style-2 ct-s1';
				break;
			case '4':
					$heading_class = 'style-3 style-4';
				break;
			case '5':
					$heading_class = 'style-3';
				break;		
			default:
				break;	
		}
		ob_start();
		?>
        	<div <?php echo ($id != '' ? ('id="' . $id  . '"') : '');?> class="ct-sc-special-hd <?php echo $heading_class !='' ? $heading_class : '' ;?>">
				<?php 
                if( $style != '2' ){
                    if( $icon && $style == '1' ){
                        if($class_substr == 'fa'){
                            echo "<i class='".$icon."'></i>";	
                        }else{
                            echo "<span class='".$icon."'></span>";
                        } 
                    }
                    echo (isset($content) && $content != '') ? ('<div class="h3 primary-title">'.do_shortcode(businesshub_remove_wpautop($content, true)).'</div>') : '';
                    if( $style != '3'){
                        echo $sub_line != '' ? ('<span class="sub-title">'.$sub_line.'</span>') : '';
                    }else{
                        $style3_class = 'sub-title';
                        if($sub_line == ''){ $style3_class .= ' no-sub ';}
                        echo '<span class="'.$style3_class.'">'.$sub_line.'</span>';	 
                    }
                }else {?>
                    <div class="h3 primary-title">
                        <?php
                            if( $icon ){
                                if($class_substr == 'fa'){
                                    echo "<i class='".$icon."'></i>";	
                                }else{
                                    echo "<span class='".$icon."'></span>";
                                } 
                            }
                        echo (isset($content) && $content != '') ? do_shortcode(businesshub_remove_wpautop($content, true)) : '';
                        ?>
                    </div>
                <?php 
                }
                ?>
            </div> 
        <?php
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
	
	public function generate_inline_css($attrs = array()){
		$css_return = '';
		$css_color = '';
		$css_color_1 = '';
		$s_color = '';
		$this->id = '';
		
		if(count($attrs) == 0) {
			$attrs = $this->attributes;
		}
		if(isset($attrs['id'])){
			$this->id = $attrs['id'];
		}
		if(isset($attrs['separator_color'])) {
			$s_color 		= $attrs['separator_color'];
		}
		
		if($s_color!='') {
			$css_color.='border-bottom-color:'.$s_color.';';
			$css_color_1.='background-color:'.$s_color.';';
		}
		
		if($this->id == ''){
			$this->generate_id();
		}
		
		if($css_color!='') {
			$css_return.='#'.$this->id.'.ct-sc-special-hd{' . $css_color . '}';
			$css_return.=	'#'.$this->id.'.ct-sc-special-hd.style-2 .sub-title:before,
							#'.$this->id.'.ct-sc-special-hd.ct-s1:not(.style-2):after,
							#'.$this->id.'.ct-sc-special-hd:not(.style-2) .primary-title > [class*="ct-icon-"] + p:before,
							#'.$this->id.'.ct-sc-special-hd:not(.style-2) .primary-title > .fa + p:before
							{' . $css_color_1 . '}';
		}
		
		return $css_return;
	}
}

$shortcode_heading = new CactusShortcodeHeading();

add_action( 'after_setup_theme', 'reg_c_heading' );
function reg_c_heading(){
    if(function_exists('vc_map')){
	vc_map(array(
		   "name" => esc_html__("Heading",'cactus'),
		   "base" => "c_heading",
		   "class" => "",
		   "icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_heading.png",
		   "controls" => "full",
		   "category" => esc_html__('Cactus Shortcodes', 'cactus'),
		   "params" => 	array(
				array(
					"admin_label" => true,
					 "type" => "dropdown",
					 "class" => "",
					 "heading" => esc_html__("Style", "cactus"),
					 "param_name" => "style",
					 "value" => array(
								esc_html__('Style 1 - Left alignment with sub-line', 'cactus') => '1',
								esc_html__('Style 2 - Left alignment without sub-line', 'cactus') => '2',
								esc_html__('Style 3 - Center alignment with separator', 'cactus') => '3',
								esc_html__('Style 4 - Center alignment without separator', 'cactus') => '4',
								esc_html__('Style 5 - Center alignment with bottom-line', 'cactus') => '5',
								),
					 "description" => esc_html__("Choose heading style","cactus"),
					 "std" => '1',
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Icon", "cactus"),
					"param_name" => "icon",
					"value" => "",
					"description" => esc_html__("Class name of icon, for example 'fa fa-home'. This parameter works with style 1 &amp; 2","cactus"),
					'dependency' => array(
							'element' => 'style',
							'value' => array( '1','2' ),
					 ),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Content", "cactus"),
					"param_name" => "content",
					"value" => "",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Sub-line Text", "cactus"),
					"param_name" => "sub_line",
					"value" => "",
					'dependency' => array(
							'element' => 'style',
							'value' => array( '1','3','4','5' ),
					 ),
				),
				array(
					"admin_label" => true,
					 "type" => "colorpicker",
					 "class" => "",
					 "heading" => esc_html__("Separator Color", 'cactus'),
					 "param_name" => "separator_color",
					 "value" => '',
				),	
			)
		));
    }
}