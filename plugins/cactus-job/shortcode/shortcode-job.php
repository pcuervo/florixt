<?php
function parse_c_jobs($atts, $content=''){
	$ID = isset($atts['ID']) ? $atts['ID'] : rand(10,9999);
	$cat = isset($atts['cats']) ? $atts['cats'] : '';
	$ids = isset($atts['ids']) ? $atts['ids'] : '';
	$count = isset($atts['count']) ? $atts['count'] : 4;
	$date_expired = isset($atts['open_jobs']) ? $atts['open_jobs'] : '';
	$show_readmore = isset($atts['show_readmore']) ? $atts['show_readmore'] : '';
	$readmore_text = isset($atts['readmore_text']) ? $atts['readmore_text'] : '';
	$order = isset($atts['order']) ? $atts['order'] : 'DESC';
	$orderby = isset($atts['orderby']) ? $atts['orderby'] : 'date';
	$schema = isset($atts['schema']) ? $atts['schema'] : '';
	//display
	ob_start();
	if($schema=='1'){
		echo '<div class="dark-div">';
	}
	?>
    <div class="ct-sc-joblist">
        <div class="cactus-listing-wrap">
            <div class="cactus-listing-config style-3 job-list"> <!--addClass: style-1 + (style-2 -> style-n)-->
                <div class="cactus-sub-wrap">
                <?php $the_query = job_shortcode_query($cat,$ids,$count,$order,$orderby,$date_expired);
                if ( $the_query->have_posts() ) {
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();?>
                        <!--item listing-->
                        <div class="cactus-post-item hentry">
                        
                            <div class="entry-content">                                        
                                                                                
                                <div class="content">
                                    <div class="categories">
                                        <i class="fa fa-map-marker"></i>
                                        <span class="cactus-note-cat"><?php echo esc_attr(get_post_meta(get_the_ID(),'job-location', true ));?></span>
                                    </div>
                                    
                                    <!--Title (no title remove)-->
                                    <h3 class="h5 cactus-post-title entry-title"> 
                                        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a> 
                                    </h3><!--Title-->
                                
                                    <!--excerpt (remove)-->
                                    <div class="excerpt">
                                        <?php echo get_the_excerpt();?>
                                    </div><!--excerpt-->    
                                    <?php if($show_readmore!='1'){?>
                                    <div class="button-and-share">
                                    
                                        <a href="<?php the_permalink() ?>" class="btn btn-default btn-style-1 btn-style-2 btn-style-4">
                                            <div class="add-style">                                                                
                                                <span><?php if($readmore_text){ echo esc_attr($readmore_text);}else{ esc_html_e('Continue Reading','cactus');}?></span>
                                            </div>
                                        </a>
                                        
                                    </div>                                                
                                    <?php }?>
                                    <div class="cactus-last-child"></div> <!--fix pixel no remove-->
                                </div>
                                
                            </div>
                            
                        </div><!--item listing--> 
                        <?php
                    }//while have_posts
                }//if have_posts
                wp_reset_postdata();
                ?>
                </div>
                
            </div>
        </div>
    </div>
	<?php
	if($schema=='1'){
		echo '</div>';
	}
	//return
	$output_string = ob_get_contents();
	ob_end_clean();
	return $output_string;
}
add_shortcode( 'c_jobs', 'parse_c_jobs' );

add_action( 'after_setup_theme', 'reg_c_jobs' );
function reg_c_jobs(){
	$icon_sc = '';
	if(class_exists('CT_Shortcodes')){
		$icon_sc = BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_jobs.png";
	}
	if(function_exists('vc_map')){
	$map_array = array(
	   "name" => esc_html__("Jobs", "cactus"),
	   "base" => "c_jobs",
	   "class" => "",
	   "icon" => $icon_sc,
	   "controls" => "full",
	   "category" => esc_html__('Cactus Shortcodes', 'cactus'),
	   "params" => array(
		  array(
			"type" => "textfield",
			"heading" => esc_html__("Count", "cactus"),
			"param_name" => "count",
			"value" => "4",
			"description" => esc_html__("Number of posts to show. Default is 4", 'cactus'),
		  ),
		  array(
			"type" => "textfield",
			"heading" => esc_html__("Category", "cactus"),
			"param_name" => "cats",
			"value" => "",
			"description" => esc_html__("List of cat ID (or slug), separated by a comma", "cactus"),
		  ),
		  array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Show only Open Jobs", "cactus"),
			"param_name" => "open_jobs",
			"value" => array(
			 	esc_html__('No', 'cactus') => '0',
				esc_html__('Yes', 'cactus') => '1',
			 ),
			"description" => esc_html__("Show only Open Jobs (not expired)", "cactus"),
		  ),
		   array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Show read more link", "cactus"),
			"param_name" => "show_readmore",
			"value" => array(
			 	esc_html__('Yes', 'cactus') => '0',
				esc_html__('No', 'cactus') => '1',
			 ),
			"description" => "",
		  ),
		  array(
			"type" => "textfield",
			"heading" => esc_html__("Read More Text", "cactus"),
			"param_name" => "readmore_text",
			"value" => "",
			"description" => "",
		  ),
		  array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Schema", "cactus"),
			"param_name" => "schema",
			"value" => array(
			 	esc_html__('Light', 'cactus') => '',
				esc_html__('Dark', 'cactus') => '1',
			 ),
			"description" => "",
		  ),
	   )
	);
	vc_map($map_array);
	}
}