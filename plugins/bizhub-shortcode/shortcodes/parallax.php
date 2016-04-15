<?php
function businesshub_create_parallax($atts, $content){
	global $height;
	$randID = 'c_parallax_'.rand(1, 9999);
	$media_url 		= (isset($atts['media_url']) && trim($atts['media_url'])!='') ? $atts['media_url'] : '';
	$height 		= (isset($atts['height']) && is_numeric($atts['height'])) ? $atts['height'] : '';	
	$media_type 	= 'image';
	
	if($media_url != ''){
		$media_source   = '';
		$media_source 	= substr($media_url,-3);
		if( ($media_source == 'mkv') || ($media_source == 'avi') || ($media_source == 'mp4') || ($media_source == 'flv') || ($media_source == 'wmv') ){
			$media_type = 'video';
		}
	}
			
	ob_start();	
?>
	<div id="<?php echo $randID;?>" class="cactus-parallax-sections dark-div <?php if($media_type == 'image'){ echo ' is-parallax-bg ';}?>">
    	<?php if($media_type == 'image'){?>
        	<div class="parallax-absolute" style="background-image:url(<?php echo $media_url;?>)"></div>
        <?php }else { ?>
            <div class="cactus-video-background">
                <video preload="auto" autoplay loop>
                    <source src="<?php echo $media_url;?>" type="video/mp4">
                </video>
            </div>
        <?php }?>
    	<div class="thumb-overlay"></div>
    	<div class="ct-ft-gallery">
            <div class="ct-post-gallery">
                <ul class="ct-post-gallery-wrapper">
                	<?php echo do_shortcode(str_replace('<br class="cactus_br" />', '', $content)); ?>
                </ul>                                                
                <div class="cactus-slider-button-prev"></div>
                <div class="cactus-slider-button-next"></div>
            </div>
            <div class="cactus-slider-paper"></div>
        </div>
    </div>
    
<?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}

class CactusShortcodeParallaxSlide extends CactusShortcode {
	public function __construct( $attrs = null, $content = '' ) {
		parent::__construct('c_parallax_slide', $attrs , $content);
	}
	public function parse_shortcode($atts, $content){
		global $height;
		$heading 					= isset($atts['heading']) ? $atts['heading'] : '';
		$button_text 				= isset($atts['button_text']) ? $atts['button_text'] : '';
		$button_text_color 			= isset($atts['button_text_color']) ? $atts['button_text_color'] : '';
		$button_background_color 	= isset($atts['button_background_color']) ? $atts['button_background_color'] : '';
		$button_url 				= isset($atts['button_url']) ? $atts['button_url'] : '#';
		$align 						= isset($atts['align']) ? $atts['align'] : 'center';
		$url_target 				= isset($atts['url_target']) ? $atts['url_target'] : '0';
		$id = isset($atts['id']) ? $atts['id'] : '';
		if($url_target == 1){
			$url_target = '_blank';		
		}
		
		$parallax_class = '';
		if( $align == 'left' ){
			$parallax_class = 'style-2';
		}else if ( $align == 'center' ) {
			$parallax_class = 'style-3';
		}else{
			$parallax_class = '';	
		}
		
		ob_start();	
?>
    <li>
        <div <?php echo ($id != '' ? ('id="' . $id  . '"') : '');?> class="ct-content <?php echo $parallax_class;?>" <?php if($height!=''){ echo 'style="min-height:'.$height.'px;"';}?>>
            <div class="ct-content-text">
                <?php echo $heading != '' ? '<h3>'.$heading.'</h3>' : '' ; ?>
                <?php echo ( isset($content) && $content != '') ? (do_shortcode(businesshub_remove_wpautop($content, true))) : ''; ?>
                <?php if($button_text != ''):?>
                    <a href="<?php echo $button_url != '' ? $button_url : '#'; ?>" <?php echo $url_target != '0' ? 'target="'.$url_target.'"' : ''; ?> class="btn btn-default ">
                        <span class="add-style">
                            <?php echo $button_text != '' ? ('<span>'.$button_text.'</span>') : ''; ?>
                        </span>    
                    </a>
                <?php endif;?>
            </div>
        </div>
    </li>    
<?php
	$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
	public function generate_inline_css($attrs = array()){
		$css = '';
		
		if(count($attrs) == 0) $attrs = $this->attributes;	
		
		foreach($attrs as $att => $val){
			switch($att){
				case 'button_text_color':
					if($attrs['button_text_color'] != '' ){
						$css .= 'color:' . $val . ';';
					}
					break;
				case 'button_background_color':
					if($attrs['button_background_color'] != '' ){
						$css .= 'background-color:' . $val . ';';
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
			$css = '#' . $this->id . ' .btn.btn-default:not(:hover){' . $css . '}';
		}

		return $css;
	}
}

add_shortcode( 'c_parallax', 'businesshub_create_parallax' );
$c_parallax_slide = new CactusShortcodeParallaxSlide();

/** 
 * add button to visual composer
 */
add_action( 'after_setup_theme', 'reg_c_parallax' );
function reg_c_parallax(){
    if(function_exists('vc_map')){
		vc_map( array(
				   "name" => esc_html__("Parallax", 'cactus'),
				   "base" => "c_parallax",
				   "content_element" => true,
				   "as_parent" => array('only' => 'c_parallax_slide'),
				   "icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_parallax.png",
				   "category" => esc_html__('Cactus Shortcodes', 'cactus'),
				   "params" => 	array(
						array(
							"holder" => "br",
							"type" => "textarea",
							"admin_label" => true,
							"heading" => esc_html__("Media Url", "cactus"),
							"param_name" => "media_url",
							"value" => "",
							"description" => esc_html__("URL of background image or video","cactus"),
						),
						array(
							"holder" => "br",
							"type" => "textfield",
							"admin_label" => true,
							"heading" => esc_html__("Height", "cactus"),
							"param_name" => "height",
							"value" => "",
							"description" => esc_html__("Height of the panel (in pixels)","cactus"),
						),
				   ),
				   "js_view" => 'VcColumnView'
				)
		);
		vc_map( array(
					"name" => esc_html__("Parallax Slide", "cactus"),
					"base" => "c_parallax_slide",
					"content_element" => true,
					"as_child" => array('only' => 'c_parallax'), // Use only|except attributes to limit parent (separate multiple values with comma)
					"icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_parallax_slide.png",
					"params" => array(
						array(
							"holder" => "br",
							"admin_label" => true,
							 "type" => "dropdown",
							 "class" => "",
							 "heading" => esc_html__("Alignment", "cactus"),
							 "param_name" => "align",
							 "value" => array(
										esc_html__('Center', 'cactus') => 'center',
										esc_html__('Left', 'cactus') => 'left',
										esc_html__('Right', 'cactus') => 'right',
										),
							 "description" => esc_html__("Choose content alignment","cactus"),
							 "std" => 'center',
						),
						array(
							"holder" => "br",
							"admin_label" => true,
							"type" => "textfield",
							"heading" => esc_html__("Heading", "cactus"),
							"param_name" => "heading",
							"value" => "",
							"description" => esc_html__("Heading Text","cactus"),
						),
						array(
							"type" => "textfield",
							"heading" => esc_html__("Button Text", "cactus"),
							"param_name" => "button_text",
							"value" => "",
						),
						array(
							 "type" => "colorpicker",
							 "class" => "",
							 "heading" => esc_html__("Button Text Color", 'cactus'),
							 "param_name" => "button_text_color",
							 "value" => '',
							 "description" => esc_html__("Hexa color of button text","cactus"),
						),
						array(
							 "type" => "colorpicker",
							 "class" => "",
							 "heading" => esc_html__("Button Background Color", 'cactus'),
							 "param_name" => "button_background_color",
							 "value" => '',
							 "description" => esc_html__("Hexa color of button background"),
						),
						array(
							"type" => "textfield",
							"heading" => esc_html__("Button Url", "cactus"),
							"param_name" => "button_url",
							"value" => "",
							"description" => esc_html__("URL of button","cactus"),
						),
						array(
							"holder" => "br",
							"admin_label" => true,
							"type" => "dropdown",
							"heading" => esc_html__("Open URL in", "cactus"),
							"param_name" => "url_target",
							"value" => array(
								esc_html__("Curent Tab","cactus")=>'0',
								esc_html__("New Tab","cactus")=>'1',
							),
							"description" => "",
							"std" => '0',
						),
						array(
							"type" => "textarea_html",
							"heading" => esc_html__("Content", "cactus"),
							"param_name" => "content",
							"value" => "",
						),
					),
					 "js_view" => 'VcColumnView'
				)
		);
    }
	if(class_exists('WPBakeryShortCode') && class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_c_parallax_slide extends WPBakeryShortCodesContainer{}
		class WPBakeryShortCode_c_parallax extends WPBakeryShortCodesContainer{}
	}

}