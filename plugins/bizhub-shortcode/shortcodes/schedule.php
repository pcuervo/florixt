<?php
function businesshub_schedule($atts, $content){
	$id 		= 'c_schedule_'.rand(1, 9999);
	$scroll 	= isset($atts['scroll']) ? $atts['scroll'] : '0';
	ob_start();
?>
	
<div id="<?php echo $id;?>" class="ct-sc-schedule-box">
	<div class="ct-sc-schedule-box-content">
        <?php echo do_shortcode(str_replace('<br class="cactus_br" />', '', $content)); ?>
    </div>
</div>
    
<?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}

function businesshub_schedule_item($atts, $content){
	$heading	= isset($atts['heading']) ? $atts['heading'] : '';
	$info 		= isset($atts['info']) ? $atts['info'] : '';
	ob_start(); 
	?>
        <div class="ct-sc-schedule-box-table">
            <div class="ct-sc-schedule-box-cell">
                <?php echo $heading != '' ? ('<div><i class="fa fa-clock-o"></i>'.$heading.'</div>') : ''; ?>
            </div>
            <div class="ct-sc-schedule-box-cell">
                <?php echo $info != '' ? ('<div>'.$info.'</div>') : ''; ?>
            </div>
        </div>
	<?php
	//end
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}

add_shortcode( 'c_schedule_item', 'businesshub_schedule_item' );
add_shortcode( 'c_schedule', 'businesshub_schedule' );

/** 
 * add button to visual composer
 */
add_action( 'after_setup_theme', 'reg_c_schedule' );
function reg_c_schedule(){
    if(function_exists('vc_map')){
		vc_map( array(
				   "name" => esc_html__("Schedule", 'cactus'),
				   "base" => "c_schedule",
				   "content_element" => true,
				   "as_parent" => array('only' => 'c_schedule_item'),
				   "icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_schedule.png",
				   "category" => esc_html__('Cactus Shortcodes', 'cactus'),
				   "show_settings_on_create" => false,
				   "params" => 	array(
				   ),
				   "js_view" => 'VcColumnView'
				)
		);
		vc_map( array(
					"name" => esc_html__("Schedule Item", "cactus"),
					"base" => "c_schedule_item",
					"content_element" => true,
					"as_child" => array('only' => 'c_schedule'), // Use only|except attributes to limit parent (separate multiple values with comma)
					"icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_schedule_item.png",
					"params" => array(
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
							"heading" => esc_html__("Info", "cactus"),
							"param_name" => "info",
							"value" => "",
							"description" => esc_html__("Info Text","cactus"),
						),
					),
					 "js_view" => 'VcColumnView'
				)
		);
    }
	if(class_exists('WPBakeryShortCode') && class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_c_schedule_item extends WPBakeryShortCodesContainer{}
		class WPBakeryShortCode_c_schedule extends WPBakeryShortCodesContainer{}
	}

}