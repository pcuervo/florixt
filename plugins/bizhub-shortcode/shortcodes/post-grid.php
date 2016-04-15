<?php
function parse_c_grid($atts, $content=''){
	$ID = isset($atts['ID']) ? $atts['ID'] : rand(10,9999);
	$post_type = isset($atts['post_type']) ? $atts['post_type'] : 'post';
	$style = isset($atts['style']) ? $atts['style'] : '';
	$cat = isset($atts['taxonomy_slugs']) ? $atts['taxonomy_slugs'] : '';
	$taxonomy = isset($atts['taxonomy']) ? $atts['taxonomy'] : '';
	$ids = isset($atts['ids']) ? $atts['ids'] : '';
	$column = isset($atts['items_per_row']) ? $atts['items_per_row'] : 5;
	$row = isset($atts['row']) ? $atts['row'] : 1;
	$order = isset($atts['order']) ? $atts['order'] : 'DESC';
	$orderby = isset($atts['orderby']) ? $atts['orderby'] : 'date';
	$thumb_size = isset($atts['thumb_size']) ? $atts['thumb_size'] : 'thumb_3x2';
	$count = $row*$column;
	$meta_key = isset($atts['meta_key']) ? $atts['meta_key'] : '';
	$tag = isset($atts['tag']) ? $atts['tag'] : '';
	$show_category = isset($atts['show_category']) ? $atts['show_category'] : '1';
	$show_excerpt = isset($atts['show_excerpt']) ? $atts['show_excerpt'] : '0';
	//display
	ob_start();
	$size ='businesshub_thumb_460x307';
	if($thumb_size=='thumb_1x1'){
		$size ='businesshub_thumb_460x460';
	}else if($thumb_size!='thumb_3x2'){$size = $thumb_size;}
	?>
    <div class="portfolio <?php if($style!='2'){?>portfolio-modern<?php }?> shortcode is-single">

            <div class="cactus-listing-wrap ct-full-width">
                <div class="cactus-listing-config style-2 <?php if($column!=5){ echo 'column-'.$column;}?>">
                
                	<div class="ct-lb-background"></div>
                                    
                    <div class="spinner"></div>
                    
                    <div class="ct-lb-content">
                        <div class="ct-ove-click"></div>                                    
                        <img src="<?php echo get_template_directory_uri().'/images/placeholder-img.png';?>" alt="">
                        <div class="lb-caption"></div>
                        <div class="ct-close-light-box"><i class="fa fa-times"></i></div>	
                    </div>
                    <div class="cactus-sub-wrap">
                    <?php $the_query = businesshub_shortcode_query($post_type,$cat,$tag,$ids,$count,$order,$orderby,$meta_key,$taxonomy);
					if ( $the_query->have_posts() ) {
						while ( $the_query->have_posts() ) { $the_query->the_post(); ?>
							<!--item listing-->
                            <div class="cactus-post-item hentry">
                            
                                <div class="entry-content">                                        
                                    <!--picture (remove)-->
                                    <div class="picture">
                                        <div class="picture-content">
                                            <a href="<?php echo esc_url( get_permalink() );?>" title="<?php the_title_attribute() ?>">
                                            	<?php 
												$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'full', true);
												if(has_post_thumbnail()){
													if(businesshub_thumbnail($size)!=''){echo businesshub_thumbnail($size);}
													elseif($style!='2'){
														echo '<img alt="" src="'.businesshub_get_default_image($thumb_size).'">';
													}
												}elseif($style!='2'){ echo '<img alt="" src="'.businesshub_get_default_image($thumb_size).'">';}?>                                                           
                                            </a> 
                                            
                                            <div class="thumb-color bg-m-color-1"></div>
                                            <div class="ctl-icon-group">
                                                <a href="<?php echo esc_url( get_permalink() );?>" class="ctl-icon-hover goto-link"><i class="fa fa-link"></i></a>
                                                <a href="#" class="ctl-icon-hover search-next" data-img-src="<?php if(isset($thumbnail[0])){echo esc_url($thumbnail[0]);} ?>" data-title="<?php echo esc_attr(get_the_title()); ?>"><i class="fa fa-search"></i></a>
                                            </div> 
                                                                                                   
                                        </div>                                                                                            
                                    </div>                                                
                                    <!--picture-->
                                    <?php if($style=='2'){?>
                                        <div class="content">                                                	
                                        
                                            <!--Title (no title remove)-->
                                            <h3 class="h5 cactus-post-title entry-title"> 
                                                <a href="<?php echo esc_url( get_permalink() );?>" title=""><?php the_title(); ?></a> 
                                            </h3><!--Title-->
                                            <?php
											if(function_exists('businesshub_ratting_show')){ 
												businesshub_ratting_show();
											}
											if($show_category!='0'){?>
                                            <div class="categories">
                                                <?php businesshub_get_category($post_type);?>
                                            </div>  
                                            <?php }
                                            if($show_excerpt=='1'){ ?>
                                                <!--excerpt (remove)-->
                                                <?php if ( has_excerpt()) {?>
                                                    <div class="excerpt">
                                                        <?php echo get_the_excerpt(); ?>
                                                    </div><!--excerpt-->    
                                                <?php }?>
                                            <?php }?>
											<?php if($post_type=='download'){?>
												<?php if(function_exists('businesshub_edd_button')){ businesshub_edd_button();}?>
                                            <?php }?>                                            
                                            <div class="cactus-last-child"></div> <!--fix pixel no remove-->
                                        </div>
                                    <?php }?>
                                </div>
                                
                            </div><!--item listing-->
                        <?php
						}//while have_posts
					}//if have_posts
					wp_reset_postdata(); ?>
                    </div>
                    
                </div>
            </div>
		
    </div>        
	<?php
	//return
	$output_string = ob_get_contents();
	ob_end_clean();
	return $output_string;
}
add_shortcode( 'c_grid', 'parse_c_grid' );

add_action( 'after_setup_theme', 'reg_c_grid' );
function reg_c_grid(){
	if(function_exists('vc_map')){
	$map_array = array(
	   "name" => esc_html__("Post Grid"),
	   "base" => "c_grid",
	   "class" => "",
	   "icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_grid.png",
	   "controls" => "full",
	   "category" => esc_html__('Cactus Shortcodes', 'cactus'),
	   "params" => array(
		  array(
		  	 "admin_label" => true,
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => esc_html__("Post Type", "cactus"),
			 "param_name" => "post_type",
			 "value" => array(
			 	esc_html__('Post', 'cactus') => '',
				esc_html__('Portfolio', 'cactus') => 'ct_portfolio',
				esc_html__('Download', 'cactus') => 'download',
			 ),
			 "description" => esc_html__('Choose post type','cactus')
		  ),
		  array(
		  	 "admin_label" => true,
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => esc_html__("Style", "cactus"),
			 "param_name" => "style",
			 "value" => array(
			 	esc_html__('Style 1 (no space between items)', 'cactus') => '',
				esc_html__('Style 2 (with space between items)', 'cactus') => '2',
			 ),
			 "description" => esc_html__('Choose style','cactus')
		  ),
		  array(
		  	"admin_label" => true,
			"type" => "textfield",
			"heading" => esc_html__("IDs", "cactus"),
			"param_name" => "ids",
			"value" => "",
			"description" => esc_html__("Specify post IDs to retrieve", "cactus"),
		  ),
		  array(
		  	 "admin_label" => true,
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => esc_html__("Items per row", "cactus"),
			 "param_name" => "items_per_row",
			 "value" => array(
			 	esc_html__('5 items', 'cactus') => '',
				esc_html__('4 items', 'cactus') => '4',
				esc_html__('3 items', 'cactus') => '3',
			 ),
			 "description" => ''
		  ),
		  array(
		  	"admin_label" => true,
			"type" => "textfield",
			"heading" => esc_html__("Row", "cactus"),
			"param_name" => "row",
			"value" => "1",
			"description" => esc_html__("Number row", 'cactus'),
		  ),
		  array(
		  	 "admin_label" => true,
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => esc_html__("Taxonomy", "cactus"),
			 "param_name" => "taxonomy",
			 "value" => array(
			 	esc_html__('Category', 'cactus') => '',
				esc_html__('Portfolio Category', 'cactus') => 'portfolio_cat',
				esc_html__('Download Category', 'cactus') => 'download_category',
			 ),
			 "description" => esc_html__('Choose taxonomy','cactus')
		  ),
		  array(
		  	"admin_label" => true,
			"type" => "textfield",
			"heading" => esc_html__("Taxonomy slugs", "cactus"),
			"param_name" => "taxonomy_slugs",
			"value" => "",
			"description" => esc_html__("List taxonomy slug, separated by a comma", "cactus"),
		  ),
		  array(
		  	 "admin_label" => true,
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => esc_html__("Order", 'cactus'),
			 "param_name" => "order",
			 "value" => array(
			 	esc_html__('DESC', 'cactus') => 'DESC',
				esc_html__('ASC', 'cactus') => 'ASC',
			 ),
			 "description" => ''
		  ),
		  array(
		  	 "admin_label" => true,
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => esc_html__("Order by", 'cactus'),
			 "param_name" => "orderby",
			 "value" => array(
			 	esc_html__('Date', 'cactus') => 'date',
				esc_html__('ID', 'cactus') => 'ID',
				esc_html__('Author', 'cactus') => 'author',
			 	esc_html__('Title', 'cactus') => 'title',
				esc_html__('Name', 'cactus') => 'name',
				esc_html__('Modified', 'cactus') => 'modified',
			 	esc_html__('Parent', 'cactus') => 'parent',
				esc_html__('Random', 'cactus') => 'rand',
				esc_html__('Comment count', 'cactus') => 'comment_count',
				esc_html__('Menu order', 'cactus') => 'menu_order',
				esc_html__('Meta value', 'cactus') => 'meta_value',
				esc_html__('Meta value num', 'cactus') => 'meta_value_num',
				esc_html__('Post__in', 'cactus') => 'post__in',
				esc_html__('None', 'cactus') => 'none',
			 ),
			 "description" => ''
		  ),
		  array(
		  	"admin_label" => true,
			"type" => "textfield",
			"heading" => esc_html__("Thumbnail size", "cactus"),
			"param_name" => "thumb_size",
			"value" => "",
			"description" => esc_html__("name of thumbnail size ('thumb_1x1' | 'thumb_3x2')", "cactus"),
		  ),
		  array(
			 "admin_label" => true,
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => esc_html__("Show category", 'cactus'),
			 "param_name" => "show_category",
			 "value" => array(
			 	esc_html__('Yes', 'cactus') => '1',
				esc_html__('No', 'cactus') => '0',
			 ),
			 "description" => esc_html__("show category of item (applied for style 2 only)", "cactus"),
		  ),
		  array(
			 "admin_label" => true,
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => esc_html__("Show excerpt", 'cactus'),
			 "param_name" => "show_excerpt",
			 "value" => array(
			 	esc_html__('No', 'cactus') => '0',
				esc_html__('Yes', 'cactus') => '1',
			 ),
			 "description" => esc_html__("show item excerpt text (applied for style 2 only)", "cactus"),
		  ),
	   )
	);
	vc_map($map_array);
	}
}
