<?php 
function businesshub_create_tooltip($atts, $content = null) {
	$randID =  rand(1, 999);	
	$id = isset($atts['id']) ? $atts['id'] : 'c_tooltip_'.$randID;
	$title = isset($atts['title']) ? $atts['title'] : 'This tooltip is on top!';
ob_start();?>
    <a href="#" id="<?php echo $id;?>" data-toggle="tooltip" data-placement="top" title="<?php echo $title;?>" data-original-title="<?php echo $title;?>"><?php echo $content?></a>
<?php
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
add_shortcode('c_tooltip', 'businesshub_create_tooltip');


