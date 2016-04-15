<?php
function businesshub_create_c_counter($atts, $content){
	$randID 	=  rand(1, 999);	
	$id 		= isset($atts['id']) ? $atts['id'] : 'counter-up-'.$randID;
	$value 		= isset($atts['value']) ? $atts['value'] : 0;
	$text 		= isset($atts['text']) ? $atts['text'] : '';
	$delay 		= isset($atts['delay']) ? $atts['delay'] : '';
	$time 		= isset($atts['time']) ? $atts['time'] : '';
	ob_start();
?>
        <div id="<?php echo $id;?>" class="ct-counter-up" <?php if($delay){echo 'data-delay="'. $delay .'"';} ?> <?php if($delay){echo 'data-time="'. $time .'"';} ?>>
            <div class="counter-up-item col-md-12">
                <span class="counter-number heading-font-1" data-default-number="<?php echo $value; ?>">0</span>
                <span class="counter-text"><?php echo $text; ?></span>
            </div>
        </div>        
<?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
add_shortcode( 'c_counter', 'businesshub_create_c_counter' );

add_action( 'after_setup_theme', 'reg_c_counter' );
function reg_c_counter(){
    if(function_exists('vc_map')){
	vc_map(array(
		   "name" => esc_html__("Counter",'cactus'),
		   "base" => "c_counter",
		   "class" => "",
		   "icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_counter.png",
		   "controls" => "full",
		   "category" => esc_html__('Cactus Shortcodes', 'cactus'),
		   "params" => 	array(
				array(
					"admin_label" => true,
					"type" => "textfield",
					"heading" => esc_html__("Value", "cactus"),
					"param_name" => "value",
					"value" => "",
					"description" => esc_html__("Value To Count","cactus"),
				),
				array(
				"admin_label" => true,
					"type" => "textfield",
					"heading" => esc_html__("Text", "cactus"),
					"param_name" => "text",
					"value" => "",
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Delay", "cactus"),
					"param_name" => "delay",
					"value" => "",
					"description" => esc_html__("Delay - (ms) time between each step. Default is 10 (ms)","cactus"),
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Time", "cactus"),
					"param_name" => "time",
					"value" => "",
					"description" => esc_html__("Time - (ms) time to finish counting. Default is 1000 (ms)","cactus"),
				)
			)
		));
    }
}


