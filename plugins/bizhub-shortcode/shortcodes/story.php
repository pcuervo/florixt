<?php

class CactusShortcodeStory extends CactusShortcode {
	public function __construct( $attrs = null, $content = '' ) {
		parent::__construct('c_stories', $attrs , $content);
	}
	
	public function parse_shortcode($atts, $content){
			$id 		= isset($atts['id']) ? $atts['id'] : '';
			$scroll 	= isset($atts['scroll']) ? $atts['scroll'] : '0';
			$padding 	= isset($atts['padding']) ? $atts['padding'] : '80px 250px 80px 80px';
		ob_start();?>
			
		<div <?php echo ($id != '' ? ('id="' . $id  . '"') : '');?> class="ct-ft-gallery shortcode story-box" data-auto-play="<?php echo $scroll;?>"  data-auto-play-speed="5000">
            <div class="ct-post-gallery">
                <ul class="ct-post-gallery-wrapper">
                    <?php echo do_shortcode(str_replace('<br class="cactus_br" />', '', $content)); ?>
                </ul>
                <div class="cactus-slider-button-prev"></div>
                <div class="cactus-slider-button-next"></div>
            </div>
            <div class="cactus-slider-paper"></div>
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
		
		if(is_array($attrs)){
			foreach($attrs as $att => $val){
				switch($att){
					case 'padding':
						if($attrs['padding'] != '' ){
							$css .= 'padding:' . $val . ';';
						}
						break;
					case 'id':
						$this->id = $val;
						break;
					default:
						break;
				}
			}
		}
		
		if($this->id == ''){
			$this->generate_id();
		}
		
		if($css != ''){
			$css = '#' . $this->id . '.ct-ft-gallery.shortcode.story-box .story-box-content{' . $css . '}';
		}

		return $css;
	}
}

function businesshub_c_story($atts, $content){
	$title 		= isset($atts['title']) ? $atts['title'] : '';
	$avatar 	= isset($atts['avatar']) ? $atts['avatar'] : '';
	
	if(is_numeric($avatar)){
		$image      = wp_get_attachment_image_src($avatar, "full");
		$avatar_source = $image[0];
	}else{
		$avatar_source = $avatar;	
	}
	ob_start(); 
	?>
        <li>
            <div class="story-box-content" <?php echo $avatar_source != '' ? ('style="background-image:url('.$avatar_source.')"') : '';?> >
                <?php echo $title != '' ? ('<h3 class="story-box-title">'.$title.'</h3>') : ''; ?>
                <?php echo $content != '' ? ('<div class="story-excerpt">'.do_shortcode(businesshub_remove_wpautop($content, true)).'</div>') : ''; ?>
            </div>
        </li>
	<?php
	//end
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}

add_shortcode( 'c_story', 'businesshub_c_story' );

$shortcode_stories = new CactusShortcodeStory();

/** 
 * add button to visual composer
 */
add_action( 'after_setup_theme', 'reg_c_stories' );
function reg_c_stories(){
    if(function_exists('vc_map')){
		vc_map( array(
				   "name" => esc_html__("Story", 'cactus'),
				   "base" => "c_stories",
				   "content_element" => true,
				   "as_parent" => array('only' => 'c_story'),
				   "icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_stories.png",
				   "category" => esc_html__('Cactus Shortcodes', 'cactus'),
				   "params" => 	array(
						array(
							"admin_label" => true,
							 "type" => "dropdown",
							 "class" => "",
							 "heading" => esc_html__("Scroll", "cactus"),
							 "param_name" => "scroll",
							 "value" => array(
										esc_html__('No', 'cactus') => '0',
										esc_html__('Yes', 'cactus') => '1',
										),
							 "description" => esc_html__("Auto scroll the or not","cactus"),
 						),
						array(
							"type" => "textfield",
							"heading" => esc_html__("Padding", "cactus"),
							"param_name" => "padding",
							"value" => "",
							"description" => esc_html__("Padding to content. Default is as designed. Value is in format '0px 0px 0px 0px' (top, right, bottom, left)","cactus"),
						),
				   ),
				   "js_view" => 'VcColumnView'
				)
		);
		vc_map( array(
					"name" => esc_html__("Story", "cactus"),
					"base" => "c_story",
					"content_element" => true,
					"as_child" => array('only' => 'c_stories'), // Use only|except attributes to limit parent (separate multiple values with comma)
					"icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_story.png",
					"params" => array(
						array(
							"admin_label" => true,
							"type" => "textfield",
							"heading" => esc_html__("Title", "cactus"),
							"param_name" => "title",
							"value" => "",
							"description" => esc_html__("Title of person","cactus"),
						),
						array(
							"type" => "attach_image",
							"heading" => esc_html__("Avatar", "cactus"),
							"param_name" => "avatar",
							"value" => "",
							"description" => esc_html__("Avatar of person","cactus"),
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
		class WPBakeryShortCode_c_stories extends WPBakeryShortCodesContainer{}
		class WPBakeryShortCode_c_story extends WPBakeryShortCodesContainer{}
	}

}