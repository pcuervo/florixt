<?php
function businesshub_testimonials($atts, $content){
	$randID 	=  rand(1, 999);	
	$id 		= isset($atts['id']) ? $atts['id'] : 'c_testimonials_'.$randID;
	$scroll 	= isset($atts['scroll']) ? $atts['scroll'] : '0';
	ob_start();
?>
	
<div id="<?php echo $id;?>" class="ct-ft-gallery shortcode ct-testi" data-auto-play="<?php echo $scroll;?>"  data-auto-play-speed="5000">
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
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}

function businesshub_testimonial($atts, $content){
	$name 					= isset($atts['name']) ? $atts['name'] : '';
	$title 					= isset($atts['title']) ? $atts['title'] : '';
	$avatar 				= isset($atts['avatar']) ? $atts['avatar'] : '';
	$rate 					= isset($atts['rate']) ? $atts['rate'] : '';

	if(is_numeric($avatar)){
		$avatar_url = wp_get_attachment_image_src($avatar, "latestpost_widget");
		$avatar_url = $avatar_url[0];
	}else{
		$avatar_url = $avatar;	
	}
	ob_start(); 
	?>
    <li>
        <div class="ct-testimonials">
            <div class="ct-testimonials-content">
    			<?php if($avatar_url != ''):?>
                <div class="testi-picture">
                    <div class="ct-img">
                        <img src="<?php echo $avatar_url;?>" alt="">
                    </div>
                    <?php if($rate): ?>
                        <div class="ct-star-point m-color-2">
                            <?php for($i=0; $i < $rate; $i++){?>
                                <i class="fa fa-star"></i>
                            <?php }//endfor?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php endif;?>
                <div class="testi-content">
                    
                    <?php echo $content != '' ? ('<div class="testi-excerpt">'.do_shortcode(businesshub_remove_wpautop($content, true)).'</div>') : ''; ?>
                        
                    <?php echo $name != '' ? ('<div class="testi-author"><h6>'.$name.'</h6></div>') : ''; ?>
                    
                    <?php echo $title != '' ? (' <div class="testi-author-sub">'.$title.'</div>') : ''; ?>
                
                </div>
    
            </div>
        </div>
    </li>
	<?php
	//end
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}

add_shortcode( 'c_testimonial', 'businesshub_testimonial' );
add_shortcode( 'c_testimonials', 'businesshub_testimonials' );

/** 
 * add button to visual composer
 */
add_action( 'after_setup_theme', 'reg_c_testimonials' );
function reg_c_testimonials(){
    if(function_exists('vc_map')){
		vc_map( array(
				   "name" => esc_html__("Testimonials", 'cactus'),
				   "base" => "c_testimonials",
				   "content_element" => true,
				   "as_parent" => array('only' => 'c_testimonial'),
				   "icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_testimonials.png",
				   "category" => esc_html__('Cactus Shortcodes', 'cactus'),
				   "params" => 	array(
						array(
							"type" => "textfield",
							"heading" => esc_html__("Scroll", "cactus"),
							"param_name" => "scroll",
							"value" => "",
							"description" => esc_html__("Auto scroll the testimonial slideshow or not default is 0/false","cactus"),
						)
				   ),
				   "js_view" => 'VcColumnView'
				)
		);
		vc_map( array(
					"name" => esc_html__("Testimonial Item", "cactus"),
					"base" => "c_testimonial",
					"content_element" => true,
					"as_child" => array('only' => 'c_testimonials'), // Use only|except attributes to limit parent (separate multiple values with comma)
					"icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_testimonial.png",
					"params" => array(
						array(
							"holder" => "br",
							"admin_label" => true,
							"type" => "textfield",
							"heading" => esc_html__("Name", "cactus"),
							"param_name" => "name",
							"value" => "",
							"description" => esc_html__("Name of person","cactus"),
						),
						array(
							"holder" => "br",
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
							"type" => "textfield",
							"heading" => esc_html__("Rate", "cactus"),
							"param_name" => "rate",
							"value" => "",
							"description" => esc_html__("Number of stars","cactus"),
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
		class WPBakeryShortCode_c_testimonial extends WPBakeryShortCodesContainer{}
		class WPBakeryShortCode_c_testimonials extends WPBakeryShortCodesContainer{}
	}

}