<?php
function businesshub_image_showcase($atts, $content){
	$randID =  rand(1, 999);	
	$id = isset($atts['id']) ? $atts['id'] : 'c_image_showcases-'.$randID;

	$target_url 	= isset($atts['target_url']) ? $atts['target_url'] : '#';
	$image1_url 	= isset($atts['image1_url']) ? $atts['image1_url'] : '#';
	$image2_url 	= isset($atts['image2_url']) ? $atts['image2_url'] : '#';
	$url_target 	= isset($atts['url_target']) ? $atts['url_target'] : '0';
	if($url_target == 1){
		$url_target = '_blank';		
	}
	
	if(is_numeric($image1_url)){
		$image1      = wp_get_attachment_image_src($image1_url, "full");
		$img1_source = $image1[0];
	}else{
		$img1_source = $image1_url;	
	}
	if(is_numeric($image2_url)){
		$image2      = wp_get_attachment_image_src($image2_url, "full");
		$img2_source = $image2[0];
	}else{
		$img2_source = $image2_url;	
	}
	ob_start();
?>
	<div id="<?php echo $id;?>" class="ct-sc-imageshowcase" style="background-image:url(<?php echo $img1_source; ?>)">
        <a <?php echo $url_target != '0' ? 'target="'.$url_target.'"' : ''; ?> href="<?php echo $target_url;?>"><img src="<?php echo $img2_source; ?>" alt=""></a>
    </div>
<?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
add_shortcode( 'c_image_showcases', 'businesshub_image_showcase' );

add_action( 'after_setup_theme', 'reg_c_image_showcases' );
function reg_c_image_showcases(){
    if(function_exists('vc_map')){
	vc_map(array(
		   "name" => esc_html__("Image Showcases",'cactus'),
		   "base" => "c_image_showcases",
		   "class" => "",
		   "icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_image_showcases.png",
		   "controls" => "full",
		   "category" => esc_html__('Cactus Shortcodes', 'cactus'),
		   "params" => 	array(
				array(
					"type" => "textfield",
					"heading" => esc_html__("Target Url", "cactus"),
					"param_name" => "target_url",
					"value" => "",
					"description" => esc_html__("URL of target","cactus"),
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
					"type" => "attach_image",
					"heading" => esc_html__("Image 1", "cactus"),
					"param_name" => "image1_url",
					"value" => "",
					"description" => "Image 1 - ID of image attachment or full URL of image",
				),
				array(
					"type" => "attach_image",
					"heading" => esc_html__("Image 2", "cactus"),
					"param_name" => "image2_url",
					"value" => "",
					"description" => "Image 2 - ID of image attachment or full URL of image",
				)
			)
		));
    }
}

