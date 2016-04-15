<?php
class CactusShortcodeCountdownTimer extends CactusShortcode {
	public function __construct( $attrs = null, $content = '' ) {
		parent::__construct('c_timer', $attrs , $content);
	}
	
	public function parse_shortcode($atts, $content){
		$id 						= rand(1, 9999);
		$years_text					= (isset($atts['years_text']) && trim($atts['years_text'])!='') ? trim($atts['years_text']) : esc_html__('YRS', 'cactus');
		$months_text				= (isset($atts['months_text']) && trim($atts['months_text'])!='') ? trim($atts['months_text']) : esc_html__('MTHS', 'cactus');		
		$days_text					= (isset($atts['days_text']) && trim($atts['days_text'])!='') ? trim($atts['days_text']) : esc_html__('DAYS', 'cactus');
		$hours_text					= (isset($atts['hours_text']) && trim($atts['hours_text'])!='') ? trim($atts['hours_text']) : esc_html__('HRS', 'cactus');
		$minutes_text				= (isset($atts['minutes_text']) && trim($atts['minutes_text'])!='') ? trim($atts['minutes_text']) : esc_html__('MINS', 'cactus');
		$seconds_text				= (isset($atts['seconds_text']) && trim($atts['seconds_text'])!='') ? trim($atts['seconds_text']) : esc_html__('SECS', 'cactus');
		
		$years						= (isset($atts['years']) && is_numeric(trim($atts['years']))) ? trim($atts['years']) : date("Y");
		$months						= (isset($atts['months']) && is_numeric(trim($atts['months']))) ? trim($atts['months']) : date("m");
		$days						= (isset($atts['days']) && is_numeric(trim($atts['days']))) ? trim($atts['days']) : date("d");
		$hours						= (isset($atts['hours']) && is_numeric(trim($atts['hours']))) ? trim($atts['hours']) : '00';
		$minutes					= (isset($atts['minutes']) && is_numeric(trim($atts['minutes']))) ? trim($atts['minutes']) : '00';
		$seconds					= (isset($atts['seconds']) && is_numeric(trim($atts['seconds']))) ? trim($atts['seconds']) : '00';

		ob_start();?>
			
		<span 
			<?php echo ($id != '' ? ('id="ct-c-timer-' . $id  . '"') : '');?> 
            class="countdown-time shortcode"
            data-years-text		="<?php echo $years_text;?>"
            data-months-text	="<?php echo $months_text;?>"
            data-days-text		="<?php echo $days_text;?>"
            data-hours-text		="<?php echo $hours_text;?>"
            data-minutes-text	="<?php echo $minutes_text;?>"
            data-seconds-text	="<?php echo $seconds_text;?>"
            
            data-countdown		="<?php echo $years.'/'.$months.'/'.$days.' '.$hours.':'.$minutes.':'.$seconds;?>"
        >
        	<?php echo esc_html__('Loading...', 'cactus');?>       
        </span>
		<?php
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
}
$shortcode_countdown_timer = new CactusShortcodeCountdownTimer();

add_action( 'after_setup_theme', 'reg_businesshub_countdown_timer' );
if(!function_exists('reg_businesshub_countdown_timer')){
	function reg_businesshub_countdown_timer(){
		if(function_exists('vc_map')){
			vc_map(array(
			   "name" 				=> esc_html__('Countdown Timer', 'cactus'),
			   "base" 				=> "c_timer",
			   "icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_timer.png",
			   "category" => esc_html__('Cactus Shortcodes', 'cactus'),		   			     
			   "params" 			=> array(
											array(
												"type" => "textfield",
												"heading" => esc_html__("Years", "cactus"),
												"param_name" => "years",
												"description" => esc_html__("Ext: 2020, 2021, 2016 ...", "cactus"),
											),	
											array(
												"type" => "textfield",
												"heading" => esc_html__("Months", "cactus"),
												"param_name" => "months",
												"description" => esc_html__("Ext: 1, 2, 12 ...", "cactus"),
											),	
											array(
												"type" => "textfield",
												"heading" => esc_html__("Days", "cactus"),
												"param_name" => "days",
												"description" => esc_html__("Ext: 3, 4, 31 ...", "cactus"),
											),	
											array(
												"type" => "textfield",
												"heading" => esc_html__("Hours", "cactus"),
												"param_name" => "hours",
												"description" => esc_html__("Ext: 0, 5, 23 ...", "cactus"),
											),
											array(
												"type" => "textfield",
												"heading" => esc_html__("Minutes", "cactus"),
												"param_name" => "minutes",
												"description" => esc_html__("Ext: 0, 18, 59 ...", "cactus"),
											),
											array(
												"type" => "textfield",
												"heading" => esc_html__("Seconds", "cactus"),
												"param_name" => "seconds",
												"description" => esc_html__("Ext: 0, 12, 59 ...", "cactus"),
											),
											array(
												"type" => "textfield",
												"heading" => esc_html__('"Years" Text', "cactus"),
												"param_name" => "years_text",
											),
											array(
												"type" => "textfield",
												"heading" => esc_html__('"Months" Text', "cactus"),
												"param_name" => "months_text",
											),
											array(
												"type" => "textfield",
												"heading" => esc_html__('"Days" Text', "cactus"),
												"param_name" => "days_text",
											),
											array(
												"type" => "textfield",
												"heading" => esc_html__('"Hours" Text', "cactus"),
												"param_name" => "hours_text",
											),
											array(
												"type" => "textfield",
												"heading" => esc_html__('"Minutes" Text', "cactus"),
												"param_name" => "minutes_text",
											),
											array(
												"type" => "textfield",
												"heading" => esc_html__('"Seconds" Text', "cactus"),
												"param_name" => "seconds_text",
											),					
										),
																																					
			));
		}
	}	
}