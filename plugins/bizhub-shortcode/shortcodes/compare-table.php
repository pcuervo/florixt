<?php
function businesshub_compare_table($atts, $content)
{
    $table_class 	= isset($atts['table_class']) ? $atts['table_class'] : '';
	$table_id 		= isset($atts['id']) ? $atts['id'] : '';
	if($table_id == ''){
		$table_id = 'c_comparetable_'.rand(1, 9999);
	}
	 
ob_start();
?>
	<div <?php echo ($table_id != '' ? ('id="' . $table_id  . '"') : '');?> class="ct-compare-table-group <?php echo $table_class;?>">
    	<?php echo do_shortcode(str_replace('<br class="cactus_br" />', '', $content)); ?>
    </div>
<?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}

class CactusShortcodeCompareTableColumn extends CactusShortcode {
	public function __construct( $attrs = null, $content = '' ) {
		parent::__construct('c_column', $attrs , $content);
	}

	public function parse_shortcode($atts, $content){
		$id 			= isset($atts['id']) ? $atts['id'] : '';
		$column_class	= isset($atts['column_class']) ? $atts['column_class'] : '';
		$is_special		= isset($atts['is_special']) ? $atts['is_special'] : '0';
		$tag_color		= isset($atts['tag_color']) ? $atts['tag_color'] : '';
		$tag_bg			= isset($atts['tag_bg']) ? $atts['tag_bg'] : '';
		$column_size 	= isset($atts['column_size']) ? $atts['column_size'] : '4';
		$title			= isset($atts['title']) ? $atts['title'] : '';
		$price			= isset($atts['price']) ? $atts['price'] : '';
		$sub_text		= isset($atts['sub_text']) ? $atts['sub_text'] : '';
		$tag			= isset($atts['tag']) ? $atts['tag'] : '';
		
		if($is_special != '0' && $is_special != '1'){
			$is_special = '0';
		}
	//start
	ob_start();
	?>
	
    <div <?php echo ($id != '' ? ('id="' . $id  . '"') : '');?> class="compare-table-item col-md-<?php echo $column_size.' '.$column_class;?>">
        <div class="compare-table-content">
        	<?php echo $title != '' ? ('<div class="compare-table-title h5">'.$title.'</div>') : ''; ?>
            <div class="compare-table-price">
                <?php echo $price != '' ? ('<span>'.$price.'</span>') : ''; ?>
                <?php echo $sub_text != '' ? ('<span>'.$sub_text.'</span>') : ''; ?>
            </div>
    		<?php echo do_shortcode(str_replace('<br class="cactus_br" />', '', $content)); ?>
            <?php if ($is_special == '1'):?>
            <div class="special-compare"></div>
            <?php echo $tag != '' ? ('<div class="special-text heading-font-1">'.$tag.'</div>') : ''; ?>
            <?php endif;?>
    	</div>
    </div>
        
	<?php
		//end
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
	public function generate_inline_css($attrs = array()){
		$tag_css = '';
		$tag_color = '';
		$tag_bg = '';

		if(count($attrs) == 0) $attrs = $this->attributes;

		foreach($attrs as $att => $val){
			switch($att){
				case 'tag_color':
					if($attrs['tag_color'] != '' ){
						$tag_color = 'color:' . $val . ';';
					}
					break;
				case 'tag_bg':
					if($attrs['tag_bg'] != '' ){
						$tag_bg = 'border-top-color:' . $val . '; border-right-color:'.$val.';';
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
		

		if($tag_color != ''){
			$tag_css .= '#' . $this->id .' .special-text{' . $tag_color . '}';
		}
		
		if($tag_bg != ''){
			$tag_css .= '#' . $this->id .' .special-compare{' . $tag_bg . '}';
		}

		return $tag_css;
	}
}
$c_comparetable_column = new CactusShortcodeCompareTableColumn();

function businesshub_compare_table_row($atts, $content)
{
ob_start();
?>
	<?php echo $content != '' ? ('<div class="compare-table-option">'.do_shortcode(businesshub_remove_wpautop($content, true)).'</div>') : ''; ?>
<?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}

add_shortcode( 'c_comparetable', 'businesshub_compare_table' );
$c_comparetable_column = new CactusShortcodeCompareTableColumn();
add_shortcode( 'c_row', 'businesshub_compare_table_row' );

add_action( 'after_setup_theme', 'reg_c_comparetable' );
function reg_c_comparetable(){
	if(function_exists('vc_map')){
			vc_map( array(
			"name" => esc_html__("Compare Table", "cactus"),
			"base" => "c_comparetable",
			"as_parent" => array('only' => 'c_column'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
			"content_element" => true,
			"icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_comparetable.png",
			"class" => "",
			"controls" => "full",
			"category" => esc_html__('Cactus Shortcodes', 'cactus'),
			"is_container" => true,			
			"params" => array(
				// add params same as with any other content element
				array(
					"type" => "textfield",
					"heading" => esc_html__("Class", "cactus"),
					"param_name" => "table_class",
					"description" => esc_html__("Custom CSS class", "cactus")
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("ID", "cactus"),
					"param_name" => "id",
					"description" => esc_html__("Custom ID. If not provided, random ID is generated", "cactus")
				),
			),
			"js_view" => 'VcColumnView'
		) );
		vc_map( array(
			"name" => esc_html__("Compare Table Column", "cactus"),
			"base" => "c_column",
			"icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_column.png",
			"content_element" => true,
			"admin_label" => true,
			"as_parent" => array('only' => 'c_row'),
			"as_child" => array('only' => 'c_comparetable'), // Use only|except attributes to limit parent (separate multiple values with comma)
			'admin_enqueue_js'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL . 'assets/vc-extend-compare-table.js',
			'admin_enqueue_css'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL . 'assets/vc-extend.css',
			"params" => array(
				// add params same as with any other content element
				array(
					"type" => "textfield",
					"heading" => esc_html__("Custom CSS class", "cactus"),
					"admin_label" => true,
					"param_name" => "column_class",
					//"description" => esc_html__("Use 'recommended' class to turn this column into special one", "cactus")
				),
				array(
					"type" => "dropdown",
					"admin_label" => true,
					"heading" => esc_html__("Special Column", "cactus"),
					"param_name" => "is_special",
					"value" => array(
						esc_html__('True', 'cactus') => '1',
						esc_html__('False', 'cactus') => '0',
					),
					"description" => esc_html__("Select between 2, 3, 4, 6. Total column_size values of all columns should equal to 12", "cactus"),
					"std" => '0',
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Tag", "cactus"),
					"param_name" => "tag",
					"description" => esc_html__("Tag of this column", "cactus"),
					'dependency' => array(
							'element' => 'is_special',
							'value' => array( '1' ),
					 ),
				),
				array(
					 "type" => "colorpicker",
					 "class" => "",
					 "heading" => esc_html__("Tag Color", "cactus"),
					 "param_name" => "tag_color",
					 "value" => "",
					 "description" => esc_html__("Color of Tag in Special Column","cactus"),
					 'dependency' => array(
							'element' => 'is_special',
							'value' => array( '1' ),
					 ),
			  	),
				array(
					 "type" => "colorpicker",
					 "class" => "",
					 "heading" => esc_html__("Tag Background", 'cactus'),
					 "param_name" => "tag_bg",
					 "value" => "",
					 "description" => esc_html__("Background color of Tag in Special Column","cactus"),
					 'dependency' => array(
							'element' => 'is_special',
							'value' => array( '1' ),
					 ),
			  	),
				array(
					"type" => "dropdown",
					"holder" => "br",
					"admin_label" => true,
					"heading" => esc_html__("Column Size", "cactus"),
					"param_name" => "column_size",
					"value" => array(
						esc_html__('2', 'cactus') => '2',
						esc_html__('3', 'cactus') => '3',
						esc_html__('4', 'cactus') => '4',
						esc_html__('6', 'cactus') => '6',
					),
					"description" => esc_html__("Select between 2, 3, 4, 6. Total column_size values of all columns should equal to 12", "cactus"),
					"std" => '4',
					'dependency' 	=> 	array(
							 		'callback' => 'compareTableCallbackColumns',
								),
				),
				array(
					"admin_label" => true,
					"holder" => "br",
					"type" => "textfield",
					"heading" => esc_html__("Title", "cactus"),
					"param_name" => "title",
					"description" => esc_html__("Title of this column (plan)", "cactus")
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Price", "cactus"),
					"param_name" => "price",
					"description" => esc_html__("Price of this plan", "cactus")
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Sub Text", "cactus"),
					"param_name" => "sub_text",
					"description" => esc_html__("Sub Text of this column", "cactus")
				),
			),
			"js_view" 		=> 'VcColumnView',			
		) );
		vc_map( array(
			"name" => esc_html__("Compare Table Row", "cactus"),
			"base" => "c_row",
			"icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_row.png",
			"as_child" => array('only' => 'c_column'), // Use only|except attributes to limit parent (separate multiple values with comma)
			"params" => array(
				// add params same as with any other content element
				array(
					"admin_label" => true,
					"type" => "textarea_html",
					"heading" => esc_html__("Content", "cactus"),
					"param_name" => "content",
				)
			),
			"js_view" => 'VcColumnView'
		) );
		//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
		if(class_exists('WPBakeryShortCode') && class_exists('WPBakeryShortCodesContainer')){
			class WPBakeryShortCode_c_comparetable extends WPBakeryShortCodesContainer{}
			class WPBakeryShortCode_c_column extends WPBakeryShortCodesContainer{}
			class WPBakeryShortCode_c_row extends WPBakeryShortCodesContainer{}
		}
		
	}
}
