<?php
class CactusShortcodeBanner extends CactusShortcode {
	public function __construct( $attrs = null, $content = '' ) {
		parent::__construct('c_banner', $attrs , $content);
	}
	
	public function parse_shortcode($atts, $content){
		$id 			= isset($atts['id']) ? $atts['id'] : '';
		$image 			= isset($atts['image']) ? $atts['image'] : '';
		$title 			= isset($atts['title']) ? $atts['title'] : '';
		$sub_line 		= isset($atts['sub_line']) ? $atts['sub_line'] : '';
		$button_text 	= isset($atts['button_text']) ? $atts['button_text'] : '';
		$button_url 	= isset($atts['button_url']) ? $atts['button_url'] : '#';
		$overlay_color 	= isset($atts['overlay_color']) ? $atts['overlay_color'] : '';
		$url_target 	= isset($atts['url_target']) ? $atts['url_target'] : '0';
		if($url_target == 1){
			$url_target = '_blank';		
		}
		
		if(is_numeric($image)){
			$img_source      = wp_get_attachment_image_src($image, "full");
			$image = $img_source[0];
		}
		
		//start
		ob_start();?>
			
        <div <?php echo ($id != '' ? ('id="' . $id  . '"') : '');?> class="ct-sc-smartbanner">
            <div>
                <img src="<?php echo $image;?>" alt="">
                <div class="thumb-overlay"></div>
                <div class="smart-content">
                    <div class="smart-table">
                        <div class="smart-table-cell">
                        	<?php echo $title != '' ? ('<div class="smart-title h3">'.$title.'</div>') : ''; ?>
                            <?php echo $sub_line != '' ? ('<div class="smart-excerpt">'.$sub_line.'</div>') : ''; ?>  
                            <a <?php echo $url_target != '0' ? 'target="'.$url_target.'"' : ''; ?> href="<?php echo $button_url != '' ? $button_url : '#'; ?>" class="btn btn-default btn-style-1 btn-style-2 btn-style-4 imp-color-2">
                                <div class="add-style">
                                    <?php echo $button_text != '' ? ('<span>'.$button_text.'</span>') : esc_html__('Button Text','cactus'); ?>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
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
		
		if(count($attrs) == 0) $attrs = $this->attributes;	
		
		foreach($attrs as $att => $val){
			switch($att){
				case 'overlay_color':
					if($attrs['overlay_color'] != '' ){
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
			$css = '#' . $this->id . ' .thumb-overlay{' . $css . '}';
		}

		return $css;
	}
}

$shortcode_banner = new CactusShortcodeBanner();

add_action( 'after_setup_theme', 'reg_c_banner' );
function reg_c_banner(){
	if(function_exists('vc_map')){
	vc_map( array(
	   "name" => esc_html__("Banner",'cactus'),
	   "base" => "c_banner",
	   "class" => "",
	   "icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_banner.png",
	   "category" => esc_html__('Cactus Shortcodes', 'cactus'),
	   "params" => array(
	   	  array(
			"type" => "attach_image",
			"heading" => esc_html__("Image", "cactus"),
			"param_name" => "image",
			"value" => "",
			/*"description" => esc_html__("ID of attachment or full URL of image","cactus"),*/
		  ),
		  array(
		  	"admin_label" => true,
			"type" => "textfield",
			"heading" => esc_html__("Title", "cactus"),
			"param_name" => "title",
			"value" => "",
			"description" => esc_html__("Title","cactus"),
		  ),
		  array(
			"type" => "textfield",
			"heading" => esc_html__("Sub Text", "cactus"),
			"param_name" => "sub_line",
			"value" => "",
			"description" => esc_html__("Sub Text","cactus"),
		  ),
		  array(
			"type" => "textfield",
			"heading" => esc_html__("Button Text", "cactus"),
			"param_name" => "button_text",
			"value" => "",
			"description" => esc_html__("Button Text","cactus"),
		  ),
		  array(
			"type" => "textfield",
			"heading" => esc_html__("Button Url", "cactus"),
			"param_name" => "button_url",
			"value" => "",
			"description" => esc_html__("URL of button","cactus"),
		  ),
		  array(
				"type" => "dropdown",
				"heading" => esc_html__("Open URL in", "cactus"),
				"param_name" => "url_target",
				"value" => array(
					esc_html__("Curent Tab","cactus")=>'0',
					esc_html__("New Tab","cactus")=>'1',
				),
				"description" => "",
			),
		  array(
			 "type" => "colorpicker",
			 "class" => "",
			 "heading" => esc_html__("Overlay Color", 'cactus'),
			 "param_name" => "overlay_color",
			 "value" => "",
			 "description" => esc_html__("Hexa color of overlay layer","cactus"),
		  ),
	   )
	));
	}
}