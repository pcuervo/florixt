<?php
function businesshub_feature_showcases($atts, $content){
	$randID 		=  'c_feature_showcases_'.rand(1, 9999);
	ob_start();
?>
<div class="ct-sc-services">
	<div class="cactus-listing-wrap">
        <div class="cactus-listing-config style-3"> <!--addClass: style-1 + (style-2 -> style-n)-->
            <div class="cactus-sub-wrap">
        	<?php echo do_shortcode(str_replace('<br class="cactus_br" />', '', $content)); ?>
			</div>
        </div>
    </div>
</div>

    
<?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}

function businesshub_feature_showcase($atts, $content){
	$image			= isset($atts['image']) ? $atts['image'] : '';
	$tag 			= isset($atts['tag']) ? $atts['tag'] : '';
	$title			= isset($atts['title']) ? $atts['title'] : '';
	$title_url 		= isset($atts['title_url']) ? $atts['title_url'] : '#';
	$title_url_target 	= isset($atts['title_url_target']) ? $atts['title_url_target'] : '';
	
	global $_is_retina_;
	$thumb_size = 'businesshub_thumb_640x427';
	if( isset($_is_retina_) && $_is_retina_ ){
		$thumb_size = 'businesshub_thumb_960x640';
	}
		
	if(is_numeric($image)){
		$image = wp_get_attachment_image_src($image, $thumb_size);
		$image = $image[0];
	}
	
	if($title_url_target != ''){
		$title_url_target = 	'target="'.$title_url_target.'"';
	}
	ob_start(); 
	?>
    
    <div class="cactus-post-item hentry">

        <div class="entry-content">
			<?php 
				if($title_url_target != ''){
					echo $image != '' ? ('<div class="picture"><div class="picture-content"><a href="'.$title_url.'" '.$title_url_target.' title=""><img src="'.$image.'"></a></div></div>') : '';  
				}else{
					echo $image != '' ? ('<div class="picture"><div class="picture-content"><img src="'.$image.'"></div></div>') : ''; 
				}
			?>

            <div class="content">
            	<?php echo $tag != '' ? ('<div class="categories"><span class="cactus-note-cat" title="">'.$tag.'</span></div>') : ''; ?>
				
                <?php 
					if($title_url_target != ''){
						echo $title != '' ? ('<h3 class="h4 cactus-post-title entry-title"><a href="'.$title_url.'" '.$title_url_target.' title="">'.$title.'</a></h3>') : ''; 
					}else{
						echo $title != '' ? ('<h3 class="h4 cactus-post-title entry-title">'.$title.'</h3>') : ''; 
					}
				?>

				<?php echo $content != '' ? ('<div class="excerpt">'.do_shortcode(businesshub_remove_wpautop($content, true)).'</div>') : ''; ?>

                <div class="cactus-last-child"></div> <!--fix pixel no remove-->
            </div>

        </div>

    </div>

	<?php
	//end
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}

add_shortcode( 'c_feature_showcase', 'businesshub_feature_showcase' );
add_shortcode( 'c_feature_showcases', 'businesshub_feature_showcases' );

/** 
 * add button to visual composer
 */
add_action( 'after_setup_theme', 'reg_c_feature_showcases' );
function reg_c_feature_showcases(){
    if(function_exists('vc_map')){
		vc_map( array(
				   "name" => esc_html__("Feature Showcases", 'cactus'),
				   "base" => "c_feature_showcases",
				   "content_element" => true,
				   "as_parent" => array('only' => 'c_feature_showcase'),
				   "icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_feature_showcases.png",
				   "category" => esc_html__('Cactus Shortcodes', 'cactus'),
				   "show_settings_on_create" => false,
				   "params" => 	array(
						//No Parameter
				   ),
				   "js_view" => 'VcColumnView'
				)
		);
		vc_map( array(
					"name" => esc_html__("Feature Showcase Item", "cactus"),
					"base" => "c_feature_showcase",
					"content_element" => true,
					"as_child" => array('only' => 'c_feature_showcases'), // Use only|except attributes to limit parent (separate multiple values with comma)
					"icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_feature_showcase.png",
					"params" => array(
						array(
							"type" => "attach_image",
							"heading" => esc_html__("Image", "cactus"),
							"param_name" => "image",
							"value" => "",
						),
						array(
							"type" => "textfield",
							"heading" => esc_html__("Tag", "cactus"),
							"param_name" => "tag",
							"value" => "",
							//"description" => esc_html__("Name of person","cactus"),
						),
						array(
							"holder" => "br",
							"admin_label" => true,
							"type" => "textfield",
							"heading" => esc_html__("Title", "cactus"),
							"param_name" => "title",
							"value" => "",
							//"description" => esc_html__("Title of person","cactus"),
						),
						array(
							"type" => "textfield",
							"heading" => esc_html__("Title URL", "cactus"),
							"param_name" => "title_url",
							"value" => "",
							"description" => esc_html__("(optional) enable clickable title","cactus"),
						),
						array(
							"type" => "textfield",
							"heading" => esc_html__("Title URL Target", "cactus"),
							"param_name" => "title_url_target",
							"value" => "",
							"description" => esc_html__("target of URL on title (Empty or '_blank')","cactus"),
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
		class WPBakeryShortCode_c_feature_showcase extends WPBakeryShortCodesContainer{}
		class WPBakeryShortCode_c_feature_showcases extends WPBakeryShortCodesContainer{}
	}

}