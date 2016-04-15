<?php

function businesshub_iconbox($atts, $content){
	global $style, $item_width;
	$parent_id 		= 'iconbox_'.rand(1, 9999);
	$style 			= isset($atts['style']) ? $atts['style'] : '1';
	$item_width 	= isset($atts['item_width']) ? $atts['item_width'] : '1_12';
	
	if($style != '1' && $style != '2' && $style != '3' && $style != '4' && $style != '5'){
		$style = '1';	
	}
	
	if($item_width != '1_12' && $item_width != '2_12' && $item_width != '3_12' && $item_width != '4_12' && $item_width != '1_5'){
		$item_width = '1_12';	
	}
	
	$style_class 	= '';
	switch($style) {
		case '2':
			$style_class 	= 'style-2 style-2a';
			break;
		case '3':
			$style_class 	= 'style-2';
			break;	
		case '4':
			$style_class 	= 'style-3';
			break;
		case '5':
			$style_class 	= 'style-4';
			break;
		default:
			break;	
	}
	
	//start
	ob_start();?>
    
    <div <?php echo ($parent_id != '' ? ('id="' . $parent_id  . '"') : '');?> class="ct-sc-icon-box <?php echo ($style_class != '' ? $style_class : '');?>">
         <div class="ct-sc-icon-box-content">
            <?php echo do_shortcode(str_replace('<br class="cactus_br" />', '', $content)); ?>
        </div>
    </div>
	
	<?php
	//end
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}	

class CactusShortcodeIconBoxItem extends CactusShortcode {
	public function __construct( $attrs = null, $content = '' ) {
		parent::__construct('c_iconbox_item', $attrs , $content);
	}
	
	public function parse_shortcode($atts, $content){
		global $style, $item_width;
		$icon 			= isset($atts['icon']) ? $atts['icon'] : '';
		$icon_image 	= isset($atts['icon_image']) ? $atts['icon_image'] : '';
		$title 			= isset($atts['title']) ? $atts['title'] : '';
		$icon_color	 	= isset($atts['icon_color']) ? $atts['icon_color'] : '';
		$id 			= isset($atts['id']) ? $atts['id'] : '';
		
		if($style == '4'){
			if(is_numeric($icon_image)){
				$icon_image = wp_get_attachment_image_src($icon_image, "full");
				$icon_image	= $icon_image[0];
			}
		}
		
		$item_class = '';
		if($style != '3'){
			$item_class 	= 'col-md-12';
			switch($item_width){
				case '1_12':
				$item_class 	= 'col-md-1';
					break;
				case '2_12':
				$item_class 	= 'col-md-2';
					break;
				case '3_12':
				$item_class 	= 'col-md-3';
					break;
				case '4_12':
				$item_class 	= 'col-md-4';
					break;
				case '1_5':
				$item_class 	= 'col-md-4 columns-5';
					break;	
				default:
				$item_class 	= 'col-md-12';
					break;
			}
		}
		//start
		ob_start();?>
        
        <div <?php echo ($id != '' ? ('id="' . $id  . '"') : '');?> class="iconbox-item <?php echo $item_class; ?>">
        	
			<?php if( ($style == '1') || ($style == '5') ){ //style1 1+5 ?>
            <!---style 1 & Style 5 -->
                <div class="ct-sc-special-hd ct-s2">
                    <h3 class="primary-title h4">
                    	<?php echo $icon != '' ? ('<span class="icon '.$icon.'"></span>') : ''; ?>
                        <?php echo $title != '' ? ('<span>'.$title.'</span>') : ''; ?>
                    </h3>
                </div>
                <?php echo $content != '' ? ('<div class="text-content">'.do_shortcode(businesshub_remove_wpautop($content, true)).'</div>') : ''; ?>                
            <!---style 1 & Style 5 -->

			<?php } else if($style == '2' || $style == '3'){ //style2 + style3 ?>
            <!---style 2 -->
            	<div class="ct-sc-special-hd ct-s1">
                    <?php echo $icon != '' ? ('<span class="icon '.$icon.'"></span>') : ''; ?>
                    <?php echo $title != '' ? ('<h3 class="primary-title h6">'.$title.'</h3>') : ''; ?>
                    <?php echo $content != '' ? ('<div class="sub-title">'.do_shortcode(businesshub_remove_wpautop($content, true)).'</div>') : ''; ?>  
                </div>
            <!---style 2 -->
            
            <?php } else if ($style == '4' && $icon_image != ''){ //style 4 + Icon Image ?>
            <!---style 4 -->
            	<?php echo $icon_image != '' ? ('<div class="oval-icon"><div class="icon-content"><div class="icon-absolute"><div class="icon-table"><div class="icon-cell icon-image"><img src="'.$icon_image.'" alt=""></div></div></div></div></div>') : ''; ?>
                <?php echo $title != '' ? ('<h3 class="h6 primary-title">'.$title.'</h3>') : ''; ?>
            <!---style 4 -->
			<?php } else { //style 4 ?>
            <!---style 4 -->
            	<?php echo $icon != '' ? ('<div class="oval-icon"><div class="icon-content"><div class="icon-absolute"><div class="icon-table"><div class="icon-cell"><span class="icon '.$icon.'"></span></div></div></div></div></div>') : ''; ?>
                <?php echo $title != '' ? ('<h3 class="h6 primary-title">'.$title.'</h3>') : ''; ?>
            <!---style 4 -->
            <?php }?>
            
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
		
		foreach($attrs as $att => $val){
			switch($att){
				case 'icon_color':
					if($attrs['icon_color'] != '' ){
						$css .= 'color:' . $val . ';';
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
		
		if($css != ''){
			$css = '#' . $this->id .'.iconbox-item .icon{' . $css . '}';
		}

		return $css;
	}
}

$shortcode_iconbox_item = new CactusShortcodeIconBoxItem();
add_shortcode( 'c_iconbox', 'businesshub_iconbox' );

/** 
 * add button to visual composer
 */
add_action( 'after_setup_theme', 'reg_c_iconbox' );
function reg_c_iconbox(){
    if(function_exists('vc_map')){
		vc_map( array(
				   "name" => esc_html__("Icon Box", 'cactus'),
				   "base" => "c_iconbox",
				   "content_element" => true,
				   "as_parent" => array('only' => 'c_iconbox_item'),
				   "icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_iconbox.png",
				   "category" => esc_html__('Cactus Shortcodes', 'cactus'),
				   "show_settings_on_create" => true,
				   'admin_enqueue_js'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL . 'assets/vc-extend-icon-box.js',
				   'admin_enqueue_css'	=> BUSINESSHUB_SHORTCODE_PLUGIN_URL . 'assets/vc-extend.css',
				   "params" => 	array(
						array(
							"admin_label" => true,
							 "type" => "dropdown",
							 "class" => "",
							 "heading" => esc_html__("Style", "cactus"),
							 "param_name" => "style",
							 "value" => array(
										esc_html__('Style 1 - Column', 'cactus') => '1',
										esc_html__('Style 2 - Column (Big Icon)', 'cactus') => '2',
										esc_html__('Style 3 - List', 'cactus') => '3',										
										esc_html__('Style 4 - Grid', 'cactus') => '4',
										esc_html__('Style 5 - Column with overlay icon', 'cactus') => '5',
										),
							 "description" => esc_html__("Select icon box style.","cactus"),
							 "std" => '1',
						),
						array(
							"admin_label" => true,
							 "type" => "dropdown",
							 "class" => "",
							 "heading" => esc_html__("Item_width (required)", "cactus"),
							 "param_name" => "item_width",
							 "value" => array(
										esc_html__('1/12 (12 items)', 'cactus') => '1_12',
										esc_html__('2/12 (6 items)', 'cactus') => '2_12',
										esc_html__('3/12 (4 items)', 'cactus') => '3_12',
										esc_html__('4/12 (3 items)', 'cactus') => '4_12',
										esc_html__('1/5 (5 items)', 'cactus') => '1_5',
										),
							 "description" => esc_html__("(values: 1/12 - 2/12 - 3/12 - 4/12) select width for each item depends on number of icon boxes. For example, if there are 4 boxes, width should be 3/12 (3_12). Item Width has no effect in List style (style 2)","cactus"),
							 "std" => '1_12',
							 'dependency' => array(
							 					'callback' => 'iconBoxCallbackColumns',
											),
							 
						),
				   ),
				   "js_view" => 'VcColumnView'
				)
		);
		vc_map( array(
					"name" => esc_html__("IconBox Item", "cactus"),
					"base" => "c_iconbox_item",
					"content_element" => true,
					"as_child" => array('only' => 'c_iconbox'), // Use only|except attributes to limit parent (separate multiple values with comma)
					"icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_iconbox_item.png",
					"params" => array(
						array(
							"type" => "textfield",
							"heading" => esc_html__("Icon", "cactus"),
							"param_name" => "icon",
							"value" => "",
							"description" => esc_html__("Icon class, for example 'fa fa-home'","cactus"),
						),
						array(
							"type" => "attach_image",
							"heading" => esc_html__("Icon Image", "cactus"),
							"param_name" => "icon_image",
							"value" => "",
							"description" => esc_html__("Work with Style 4 - Grid","cactus"),
						),
						array(
							"admin_label" => true,
							"type" => "textfield",
							"heading" => esc_html__("Title", "cactus"),
							"param_name" => "title",
							"value" => "",
							"description" => esc_html__("Title of box","cactus"),
						),
						array(
							"type" => "colorpicker",
							"heading" => esc_html__("Icon Color", "cactus"),
							"param_name" => "icon_color",
							"value" => "",
							"description" => esc_html__("Color of icon","cactus"),
						),
						array(
							"type" => "textarea",
							"heading" => esc_html__("Content", "cactus"),
							"param_name" => "content",
							"value" => "",
						)
					),
					 "js_view" => 'VcColumnView'
				)
		);
    }
	if(class_exists('WPBakeryShortCode') && class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_c_iconbox extends WPBakeryShortCodesContainer{}
		class WPBakeryShortCode_c_iconbox_item extends WPBakeryShortCodesContainer{}
	}
}