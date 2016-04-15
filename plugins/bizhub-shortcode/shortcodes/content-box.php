<?php
function businesshub_content_box($atts, $content){
	$randID = 'c_content_box_'.rand(1, 999);

	$image 			= isset($atts['image']) ? $atts['image'] : '';
	$title 			= isset($atts['title']) ? $atts['title'] : '';
	$layout			= isset($atts['layout']) ? $atts['layout'] : '';
	$button_text 	= isset($atts['button_text']) ? $atts['button_text'] : '';
	$button_url 	= isset($atts['button_url']) ? $atts['button_url'] : '#';
	$title_url 		= isset($atts['title_url']) ? $atts['title_url'] : '0';
	$alignment 		= isset($atts['alignment']) ? $atts['alignment'] : 'left';
	$url_target 	= isset($atts['url_target']) ? $atts['url_target'] : '0';
	
	if(is_numeric($image)){
		$img1_source      = wp_get_attachment_image_src($image, "full");
		$image = $img1_source[0];
	}
	
	$style_2_class = '';
	$content_box_class_wrap = 'ct-sc-blog-v1';
	$content_box_class = 'style-2';
	if(isset($layout) && $layout == 'layout_2'){
		$content_box_class_wrap = 'ct-sc-blog-v2';
		$content_box_class = 'style-3';
		if(isset($alignment) && $alignment == 'right'){
			$style_2_class = ' style-special ';
		}
	}
	
	if($url_target == '1'){
		$url_target = 	'target="_blank"';
	}else{
		$url_target = 	'';
	}
	
	ob_start();
?>
    
    <div id="<?php echo $randID;?>" class="ct-sc-content-box <?php echo $content_box_class_wrap;?>">
        <div class="cactus-listing-wrap">
            <div class="cactus-listing-config <?php echo $content_box_class.$style_2_class;?>"> <!--addClass: style-1 + (style-2 -> style-n)-->
                <div class="cactus-sub-wrap">
                    <!--item listing-->
                    <div class="cactus-post-item hentry">
                        <div class="entry-content">
                         	
                            <?php 
								if($title_url == true){
									echo $image != '' ? ('<div class="picture"><div class="picture-content"><a href="'.$button_url.'" '.$url_target.'><img src="'.$image.'" alt=""></a></div></div>') : '';  
								}else{
									echo $image != '' ? ('<div class="picture"><div class="picture-content"><img src="'.$image.'" alt=""></div></div>') : ''; 
								}
							?>
                            <div class="content">
                            	<?php 
									if($title_url == true){
										echo $title != '' ? ('<h3 class="h4 cactus-post-title entry-title"><a href="'.$button_url.'" '.$url_target.'>'.$title.'</a></h3>') : ''; 
									}else{
										echo $title != '' ? ('<h3 class="h4 cactus-post-title entry-title">'.$title.'</h3>') : ''; 
									}
								?>
                                
								<?php echo $content != '' ? ('<div class="excerpt">'.do_shortcode(businesshub_remove_wpautop($content, true)).'</div>') : ''; ?>
    							
								<?php if ($button_text != ''): ?>
                                    <div class="button-and-share">
                                        <a href="<?php echo $button_url;?>" <?php echo $url_target != '0' ? $url_target : ''; ?> class="btn btn-default btn-style-1 btn-style-2 btn-style-4 imp-color-2">
                                            <div class="add-style">
                                                <?php echo '<span>'.$button_text.'</span>'; ?>
                                            </div>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="cactus-last-child"></div> <!--fix pixel no remove-->
                            </div>
                        </div>
                    </div>
                    <!--item listing-->
                </div>
            </div>
        </div>
    </div>
 
<?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
add_shortcode( 'c_contentbox', 'businesshub_content_box' );

add_action( 'after_setup_theme', 'reg_c_content_box' );
function reg_c_content_box(){
    if(function_exists('vc_map')){
	vc_map(array(
		   "name" => esc_html__("Content Box",'cactus'),
		   "base" => "c_contentbox",
		   "class" => "",
		   "icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_contentbox.png",
		   "controls" => "full",
		   "category" => esc_html__('Cactus Shortcodes', 'cactus'),
		   "params" => 	array(
				array(
					"type" => "attach_image",
					"heading" => esc_html__("Image", "cactus"),
					"param_name" => "image",
					"value" => "",
				),
				array(
					"admin_label" => true,
					 "type" => "dropdown",
					 "class" => "",
					 "heading" => esc_html__("Layout", "cactus"),
					 "param_name" => "layout",
					 "value" => array(
								esc_html__('Layout 1 Big Thumbnail.', 'cactus') => 'layout_1',
								esc_html__('Layout 2 - Small Thumbnail.', 'cactus') => 'layout_2',
								),
					 "description" => esc_html__("Select between 2 Layout.","cactus"),
					 "std" => 'layout_1',
				),
				array(
					"admin_label" => true,
					 "type" => "dropdown",
					 "class" => "",
					 "heading" => esc_html__("Alignment", "cactus"),
					 "param_name" => "alignment",
					 "value" => array(
								esc_html__('Left', 'cactus') => 'left',
								esc_html__('Right', 'cactus') => 'right',
								),
					 "description" => esc_html__("(for layout 2) left or right","cactus"),
					 "std" => 'left',
				),
				array(
					"holder" => "br",
					"admin_label" => true,
					"type" => "textfield",
					"heading" => esc_html__("Title", "cactus"),
					"param_name" => "title",
					"value" => "",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Button Text", "cactus"),
					"param_name" => "button_text",
					"value" => "",
				),
				array(
					 "type" => "dropdown",
					 "class" => "",
					 "heading" => esc_html__("Link in Title", "cactus"),
					 "param_name" => "title_url",
					 "value" => array(
					 			esc_html__('No', 'cactus') => '0',
								esc_html__('Yes', 'cactus') => '1',
								),
					 "std" => 'no',
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Button URL", "cactus"),
					"param_name" => "button_url",
					"value" => "",
				),
				array(
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
					"type" => "textarea",
					"heading" => esc_html__("Content", "cactus"),
					"param_name" => "content",
					"value" => "",
				),
			)
		));
    }
}

