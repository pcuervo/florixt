<?php
function parse_businesshub_blog($atts, $content=''){
	$ID = isset($atts['ID']) ? $atts['ID'] : rand(10,9999);
	$post_type = isset($atts['post_type']) ? $atts['post_type'] : 'post';
	$style = isset($atts['style']) ? $atts['style'] : 'grid';
	$cat = isset($atts['cats']) ? $atts['cats'] : '';
	$tag = isset($atts['tag']) ? $atts['tag'] : '';
	$ids = isset($atts['ids']) ? $atts['ids'] : '';
	$count = isset($atts['count']) ? $atts['count'] : 4;
	$order = isset($atts['order']) ? $atts['order'] : 'DESC';
	$orderby = isset($atts['orderby']) ? $atts['orderby'] : 'date';
	$meta_key = isset($atts['meta_key']) ? $atts['meta_key'] : '';
	$schema = isset($atts['schema']) ? $atts['schema'] : '';
	$thumb_size = isset($atts['thumb_size']) ? $atts['thumb_size'] : 'thumb_3x2';
	//display
	$size ='businesshub_thumb_460x307';
	if($thumb_size=='thumb_1x1'){
		$size ='businesshub_thumb_460x460';
	}else if($thumb_size!='thumb_3x2'){$size = $thumb_size;}
	if($count==''){$count = 4;}
	ob_start();
	if($schema=='1'){
		echo '<div class="dark-div">';
	}
	?>
	<div class="<?php if($style=='list'){?> ct-sc-blog-v2 <?php }else{?> ct-sc-blog-v1 <?php }?>">
            <div class="cactus-listing-wrap">
                <div class="cactus-listing-config <?php if($style=='list'){?> style-3 <?php }else{?> style-2 <?php }?>"> <!--addClass: style-1 + (style-2 -> style-n)-->
                    <div class="cactus-sub-wrap">
                	<?php $the_query = businesshub_shortcode_query($post_type,$cat,$tag,$ids,$count,$order,$orderby,$meta_key);
					if ( $the_query->have_posts() ) {
						while ( $the_query->have_posts() ) {
							$the_query->the_post();?>
                            <div class="cactus-post-item hentry">
                                <div class="entry-content">
                                	<?php if(has_post_thumbnail()){?>                                        
                                    <!--picture (remove)-->
                                    <div class="picture">
                                        <div class="picture-content">
                                            <a href="<?php echo esc_url( get_permalink() );?>" title="<?php the_title_attribute() ?>">
                                                <?php echo businesshub_thumbnail($size);?>                                                        
                                            </a>                                                        
                                        </div>
                                        <?php if($style!='list'){?>  
                                        	<div class="note-date heading-font-1"><span><?php the_time( 'M' ); ?></span> <span><?php the_time( 'd' ); ?></span></div>                                        <?php }else{?>
                                        	<div class="note-date-v1"><?php the_time( 'M' ); ?> <?php the_time( 'd' ); ?></div>
                                        <?php }?>          
                                    </div>
                                    <!--picture-->
                                    <?php } ?>
                                    <div class="content">
                                        <div class="categories">
                                            <?php businesshub_get_category();?>
                                        </div>
                                        
                                        <!--Title (no title remove)-->
                                        <h3 class="h5 cactus-post-title entry-title"> 
                                            <a href="<?php echo esc_url( get_permalink() );?>" title=""><?php the_title(); ?></a> 
                                        </h3><!--Title-->
                                    
                                        <!--excerpt (remove)-->
                                        <div class="excerpt">
                                            <?php echo get_the_excerpt(); ?>
                                        </div><!--excerpt-->    
                                        <?php if($style!='list'){?>
                                            <div class="button-and-share">
                                            
                                                <a href="<?php echo esc_url( get_permalink() );?>" class="btn btn-default btn-style-1 btn-style-2 btn-style-4">
                                                    <div class="add-style">                                                                
                                                        <span><?php esc_html_e('CONTINUE READING','cactus');?></span>
                                                    </div>
                                                </a>
                                                
                                                <div class="ct-share-group">
                                                    <?php businesshub_print_social_share();?>
                                                </div>
                                                
                                                <div class="open-close-social">
                                                    <i class="fa fa-share-alt"></i>
                                                </div>
                                                
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
add_shortcode( 'c_blog', 'parse_businesshub_blog' );

add_action( 'after_setup_theme', 'reg_businesshub_blog' );
function reg_businesshub_blog(){
	if(function_exists('vc_map')){
	$map_array = array(
	   "name" => esc_html__("Blog", 'cactus'),
	   "base" => "c_blog",
	   "class" => "",
	   "icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_blog.png",
	   "controls" => "full",
	   "category" => esc_html__('Cactus Shortcodes', 'cactus'),
	   "params" => array(
	   	  array(
		  	 "admin_label" => true,
			 "type" => "dropdown",
			 "class" => "",
			 "heading" => esc_html__("Style", 'cactus'),
			 "param_name" => "style",
			 "value" => array(
			 	esc_html__('Grid', 'cactus') => 'grid',
				esc_html__('List', 'cactus') => 'list',
			 ),
			 "description" => ''
		  ),	
		  array(
		  	"admin_label" => true,
			"type" => "textfield",
			"heading" => esc_html__("Count", "cactus"),
			"param_name" => "count",
			"value" => "4",
			"description" => esc_html__("Number of posts to show. Default is 4", 'cactus'),
		  ),
		  array(
		  	"admin_label" => true,
			"type" => "textfield",
			"heading" => esc_html__("Category", "cactus"),
			"param_name" => "cats",
			"value" => "",
			"description" => esc_html__("List of cat ID (or slug), separated by a comma", "cactus"),
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
			"heading" => esc_html__("Meta key", "cactus"),
			"param_name" => "meta_key",
			"value" => "",
			"description" => esc_html__("Name of meta key for ordering", "cactus"),
		  ),
		  array(
		  	"admin_label" => true,
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Schema", "cactus"),
			"param_name" => "schema",
			"value" => array(
			 	esc_html__('Light', 'cactus') => '',
				esc_html__('Dark', 'cactus') => '1',
			 ),
			"description" => "",
		  ),
		  array(
		  	"admin_label" => true,
			"type" => "textfield",
			"heading" => esc_html__("Thumbnail size", "cactus"),
			"param_name" => "thumb_size",
			"value" => "",
			"description" => esc_html__("name of thumbnail size ('thumb_1x1' | 'thumb_3x2')", "cactus"),
		  ),
	   )
	);
	vc_map($map_array);
	}
}