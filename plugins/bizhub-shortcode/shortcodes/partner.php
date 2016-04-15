<?php
function businesshub_partners($atts, $content){
	$randID = 'c_partners_'.rand(1, 9999);
	ob_start();
?>
    <div id="<?php echo $randID;?>" class="cactus-partners-shortcode">
    	<div class="block-partners">
    		<div class="item-partner">
        		<div class="partner-wrap">
	   				<?php echo do_shortcode(str_replace('<br class="cactus_br" />', '', $content)); ?>
    			</div>
    		</div>
		</div>
    </div>
<?php
    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
}

function businesshub_partner($atts, $content){
	$logo 			= isset($atts['logo']) ? $atts['logo'] : '';
	$hover_text 	= isset($atts['hover_text']) ? $atts['hover_text'] : '';
	$url 			= isset($atts['url']) ? $atts['url'] : '#';
	$image 			= isset($atts['image']) ? $atts['image'] : '';
	$url_target 	= isset($atts['url_target']) ? $atts['url_target'] : '0';
	if($url_target == 1){
		$url_target = '_blank';		
	}
	
	ob_start();
?>
        	<div class="partner-item col-md-3">
        		<a href="<?php echo $url;?>" <?php echo $url_target != '0' ? 'target="'.$url_target.'"' : ''; ?> >
        			<?php if($logo && $logo != ''):?>
        	            <?php if(is_numeric($logo)):?>
        	                <?php $thumbnail = wp_get_attachment_image_src($logo,'full', true); ?>
        	                <img src="<?php echo ($thumbnail[0]); ?>" alt="<?php echo $hover_text;?>" <?php if($hover_text != '') {?> data-toggle="tooltip" data-placement="top" title="<?php echo $hover_text; ?>" <?php } ?>>
        	            <?php else:?>
        	            	<img src="<?php echo ($logo);?>" alt="<?php echo $hover_text;?>" <?php if($hover_text != '') {?> data-toggle="tooltip" data-placement="top" title="<?php echo $hover_text; ?>" <?php } ?>>
        	            <?php endif;?>
        			<?php endif;?>
        		</a>
        	</div>
<?php

	$output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
}

add_shortcode( 'c_partners', 'businesshub_partners' );
add_shortcode( 'c_partner', 'businesshub_partner' );

/** 
 * add button to visual composer
 */
add_action( 'after_setup_theme', 'reg_c_partners' );
function reg_c_partners(){
    if(function_exists('vc_map')){
		vc_map( array(
				   "name" => esc_html__("Partners", 'cactus'),
				   "base" => "c_partners",
				   "content_element" => true,
				   "as_parent" => array('only' => 'c_partner'),
				   "icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_partners.png",
				   "category" => esc_html__('Cactus Shortcodes', 'cactus'),
				   "show_settings_on_create" => false,
				   "params" => 	array(
						//null
				   ),
				   "js_view" => 'VcColumnView'
				)
		);
		vc_map( array(
					"name" => esc_html__("Partner", "cactus"),
					"base" => "c_partner",
					"content_element" => true,
					"as_child" => array('only' => 'c_partners'), // Use only|except attributes to limit parent (separate multiple values with comma)
					"icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_partner.png",
					'admin_enqueue_css'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL . 'assets/vc-extend.css',
					"params" => array(
						array(
							"type" => "attach_image",
							"heading" => esc_html__("Logo", "cactus"),
							"param_name" => "logo",
							"value" => "",
							"description" => esc_html__("ID of attachment or full URL of image","cactus"),
						),
						array(
							"holder" => "br",
							"admin_label" => true,
							"type" => "textfield",
							"heading" => esc_html__("Hover Text", "cactus"),
							"param_name" => "hover_text",
							"value" => "",
							"description" => esc_html__("Text to be appeared when logo is hovered","cactus"),
						),
						array(
							"type" => "textfield",
							"heading" => esc_html__("URL", "cactus"),
							"param_name" => "url",
							"value" => "",
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
					),
					 "js_view" => 'VcColumnView'
				)
		);
    }
	if(class_exists('WPBakeryShortCode') && class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_c_partner extends WPBakeryShortCodesContainer{}
		class WPBakeryShortCode_c_partners extends WPBakeryShortCodesContainer{}
	}

}