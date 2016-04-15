<?php
function businesshub_create_font_icon($atts, $content){
	$name 		= isset($atts['name']) ? $atts['name'] : '';
	if($name){
		$class_str 		= $name;
		$class_substr 	= substr($class_str,0,2);
	}
	ob_start();	
?>
	<?php 
		if($name){
			if($class_substr == 'fa'){
				echo "<i class='".$name."'></i>";	
			}else{
				echo "<span class='".$name."'></span>";
			} 
		}
	?>
<?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
add_shortcode( 'c_icon', 'businesshub_create_font_icon' );