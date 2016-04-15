<?php
function businesshub_slider($atts, $content=''){
	$ID = isset($atts['ID']) ? $atts['ID'] : rand(10,9999);
	$post_type = isset($atts['post_type']) ? $atts['post_type'] : 'post';
	$cat = isset($atts['taxonomy_slugs']) ? $atts['taxonomy_slugs'] : '';
	$taxonomy = isset($atts['taxonomy']) ? $atts['taxonomy'] : '';
	$tag = isset($atts['tag']) ? $atts['tag'] : '';
	$ids = isset($atts['ids']) ? $atts['ids'] : '';
	$count = isset($atts['count']) ? $atts['count'] : 9;
	$column = isset($atts['items_per_slide']) ? $atts['items_per_slide'] : 3;
	$order = isset($atts['order']) ? $atts['order'] : 'DESC';
	$orderby = isset($atts['orderby']) ? $atts['orderby'] : 'date';
	$meta_key = isset($atts['meta_key']) ? $atts['meta_key'] : '';
	$show_category = isset($atts['show_category']) ? $atts['show_category'] : '0';
	$show_excerpt = isset($atts['show_excerpt']) ? $atts['show_excerpt'] : '1';
	$auto_play = isset($atts['auto_play']) ? $atts['auto_play'] : '';
	$thumb_size = isset($atts['thumb_size']) ? $atts['thumb_size'] : 'thumb_3x2';
	$speed = isset($atts['speed']) ? $atts['speed'] : '5000';
	if($column==''){$column ='3';}
	$size ='businesshub_thumb_460x307';
	if($thumb_size=='thumb_1x1'){
		$size ='businesshub_thumb_460x460';
	}else if($thumb_size!='thumb_3x2'){$size = $thumb_size;}
    ob_start();
	if($post_type!='url'){?>
        <div class="ct-ft-gallery shortcode archive <?php if($post_type!='ct_portfolio' && $post_type!='download'){?> ct-pro-check <?php }?>" data-item="<?php echo esc_attr($column);?>" data-auto-play="<?php if($auto_play==1){?>1<?php }else{?>0<?php }?>" data-auto-play-speed="<?php echo esc_attr($speed);?>">
            <div class="ct-post-gallery">
                <div class="cactus-listing-wrap">
                    <div class="cactus-listing-config style-2"> <!--addClass: style-1 + (style-2 -> style-n)-->
                    	<?php if($post_type=='ct_portfolio'){?>
                    		<div class="ct-lb-background"></div>
                            <div class="spinner"></div>
                            <div class="ct-lb-content">
                                <div class="ct-ove-click"></div>                                    
                                <img src="<?php echo get_template_directory_uri().'/images/placeholder-img.png';?>" alt="">
                                <div class="lb-caption"></div>
                                <div class="ct-close-light-box"><i class="fa fa-times"></i></div>	
                            </div> 
                        <?php }?>      
                        <div class="cactus-sub-wrap ct-post-gallery-wrapper <?php if($post_type=='ct_portfolio'){?>portfolio <?php }?>">
                        <?php $the_query = businesshub_shortcode_query($post_type,$cat,$tag,$ids,$count,$order,$orderby,$meta_key,$taxonomy);
                        if ( $the_query->have_posts() ) {
                            while ( $the_query->have_posts() ) {
                                $the_query->the_post();?>
                                    <!--item listing-->
                                    <div class="cactus-post-item hentry">
                                        <div class="entry-content">                                        
                                            <!--picture (remove)-->
                                            <?php if(has_post_thumbnail()){?>
                                            <div class="picture">
                                                <div class="picture-content">
                                                    <a href="<?php echo esc_url( get_permalink() );?>" title="<?php the_title_attribute() ?>">
                                                        <?php echo businesshub_thumbnail($size);?>                                                        
                                                    </a>
                                                    <?php if($post_type=='ct_portfolio'){
														$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'full', true);?>
                                                        <div class="thumb-color bg-m-color-1"></div>
                                                        <div class="ctl-icon-group">
                                                            <a href="<?php echo esc_url( get_permalink() );?>" class="ctl-icon-hover goto-link"><i class="fa fa-link"></i></a>
                                                            <a href="#" class="ctl-icon-hover search-next" data-img-src="<?php if(isset($thumbnail[0])){echo esc_url($thumbnail[0]);} ?>"><i class="fa fa-search"></i></a>
                                                        </div>  
                                                    <?php }?>                                            
                                                </div>  
                                                <?php if($post_type!='ct_portfolio' && $post_type!='download'){?>
                                                	<div class="note-date heading-font-1"><span><?php the_time( 'M' ); ?></span> <span><?php the_time( 'd' ); ?></span></div>
                                                <?php }?>
                                            </div>
                                            <?php } ?>
                                            <!--picture-->
                                            <div class="content">
                                            	<?php if($show_category=='1' && $post_type=='post'){?>
                                                    <div class="categories">
                                                        <?php businesshub_get_category();?>
                                                    </div>
                                                <?php }?>
                                                <!--Title (no title remove)-->
                                                <h3 class="h5 cactus-post-title entry-title"> 
                                                    <a href="<?php echo esc_url( get_permalink() );?>" title=""><?php the_title(); ?></a> 
                                                </h3><!--Title-->
                                                <?php 
												if(function_exists('businesshub_ratting_show')){ 
													businesshub_ratting_show();
												}?>
                                                <?php if($show_category=='1' && $post_type!='post'){?>
                                                    <div class="categories">
                                                        <?php businesshub_get_category($post_type);?>
                                                    </div>
                                                    <?php if ($show_excerpt=='1' && has_excerpt()) {?>
                                                        <div class="excerpt">
                                                            <?php echo get_the_excerpt(); ?>
                                                        </div><!--excerpt-->    
                                                    <?php }?>
                                                <?php }
												if($post_type!='ct_portfolio'){ ?>
                                                    <!--excerpt (remove)-->
                                                    <?php if ($show_excerpt=='1' && has_excerpt()) {?>
                                                        <div class="excerpt">
                                                            <?php echo get_the_excerpt(); ?>
                                                        </div><!--excerpt-->    
                                                    <?php }?>
                                                    <?php if($post_type=='download' && function_exists('edd_price')){?>
                                                        <?php if(function_exists('businesshub_edd_button')){ businesshub_edd_button();}?>
                                                    <?php }else{ ?>
                                                        <div class="button-and-share">
                                                            <a href="<?php echo esc_url( get_permalink() );?>" class="btn btn-default btn-style-1 btn-style-2 btn-style-4">
                                                                <div class="add-style">                                                                
                                                                    <span><?php esc_html_e('Continue Reading','cactus');?></span>
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
                                                            
                <div class="cactus-slider-button-prev"></div>
                <div class="cactus-slider-button-next"></div>
            </div>
            <div class="cactus-slider-paper"></div>
        </div>    
    
    <?php	
	}else{?>
    	<div class="ct-ft-gallery shortcode" data-item="<?php echo esc_attr($column);?>" data-auto-play="<?php if($auto_play==1){?>1<?php }else{?>0<?php }?>" data-auto-play-speed="<?php echo esc_attr($speed);?>">
            <div class="ct-post-gallery">
                <ul class="ct-post-gallery-wrapper">
				<?php echo do_shortcode(str_replace('<br class="nc" />', '', $content)); ?>
                 </ul>                                                
                <div class="cactus-slider-button-prev"></div>
                <div class="cactus-slider-button-next"></div>
            </div>
            <div class="cactus-slider-paper"></div>
        </div>
		<?php
	}
    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
}

add_shortcode( 'c_slider', 'businesshub_slider' );

function businesshub_slider_item($atts, $content='')
{
    $image                     = isset($atts['image']) ? $atts['image'] : '';
	$url                     = isset($atts['url']) ? $atts['url'] : '';
    $url_target                 = isset($atts['url_target']) ? $atts['url_target'] : '';
    ob_start();?>
        <li>
        	<?php if($url){ ?>
                <a href="<?php echo esc_url($url);?>" <?php if(trim($url_target)!=''){?>target="<?php echo esc_attr($url_target);?>"<?php };?>>
                <?php }
					$thumbnail[0]= $thumbnail[1] = '';
					if(is_numeric($image)){
						$thumbnail = wp_get_attachment_image_src($image,'full', true);
					}elseif(strpos($image, 'http://') !== false || strpos($image, 'https://') !== false){
						$thumbnail[0] = $image;
					}
                     ?>
                    <img src="<?php echo esc_url($thumbnail[0]); ?>" alt="<?php echo esc_attr($thumbnail[1]); ?>">
                <?php if($url){ ?>
                </a>
            <?php }?>
        </li>                                   				
    <?php
    $output_string = ob_get_contents();
    ob_end_clean();
    return $output_string;
}

add_shortcode( 'c_slider_item', 'businesshub_slider_item' );


add_action( 'after_setup_theme', 'reg_c_slider' );
function reg_c_slider(){
    if(function_exists('vc_map')){
        //parent
        vc_map( array(
            "name" => esc_html__("Slider", "cactus"),
            "base" => "c_slider",
            "as_parent" => array('only' => 'c_slider_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
            "content_element" => true,
            "show_settings_on_create" => true,
			"category" => esc_html__('Cactus Shortcodes', 'cactus'),
            "icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_slider.png",
            "params" => array(
                // add params same as with any other content element
				  array(
				  	 "admin_label" => true,
					 "type" => "dropdown",
					 "class" => "",
					 "heading" => esc_html__("Post Type", "cactus"),
					 "param_name" => "post_type",
					 "value" => array(
					 	esc_html__('Post', 'cactus') => 'post',
						esc_html__('Portfolio', 'cactus') => 'ct_portfolio',
						esc_html__('Download', 'cactus') => 'download',
						esc_html__('No post type - use of image urls', 'cactus') => 'url',
					 ),
					 "description" => esc_html__('Choose post type','cactus')
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
					"type" => "textfield",
					"heading" => esc_html__("Meta key", "cactus"),
					"param_name" => "meta_key",
					"value" => "",
					"description" => esc_html__("Name of meta key for ordering", "cactus"),
				  ),
				  array(
				    "admin_label" => true, 
					"type" => "textfield",
					"heading" => esc_html__("Count", "cactus"),
					"param_name" => "count",
					"value" => "",
					"description" => esc_html__("Number of posts to show", 'cactus'),
				  ),
				  array(
				     "admin_label" => true,
					 "type" => "dropdown",
					 "class" => "",
					 "heading" => esc_html__("Items per slide", "cactus"),
					 "param_name" => "items_per_slide",
					 "value" => array(
					 	'' => '',
						esc_html__('1 item', 'cactus') => '1',
						esc_html__('2 items', 'cactus') => '2',
						esc_html__('3 items', 'cactus') => '3',
						esc_html__('4 items', 'cactus') => '4',
						esc_html__('5 items', 'cactus') => '5',
					 ),
					 "description" => esc_html__("Number of items per slide", 'cactus'),
				  ),
				  array(
				     "admin_label" => true,
					 "type" => "dropdown",
					 "class" => "",
					 "heading" => esc_html__("Show category", 'cactus'),
					 "param_name" => "show_category",
					 "value" => array(
						esc_html__('No', 'cactus') => '0',
						esc_html__('Yes', 'cactus') => '1',
					 ),
					 "description" => esc_html__("show category of item", "cactus"),
				  ),
				  array(
				     "admin_label" => true,
					 "type" => "dropdown",
					 "class" => "",
					 "heading" => esc_html__("Show excerpt", 'cactus'),
					 "param_name" => "show_excerpt",
					 "value" => array(
						esc_html__('Yes', 'cactus') => '1',
						esc_html__('No', 'cactus') => '0',
					 ),
					 "description" => esc_html__("show item excerpt text", "cactus"),
				  ),
				  array(
				     "admin_label" => true,
					 "type" => "dropdown",
					 "class" => "",
					 "heading" => esc_html__("Auto play", 'cactus'),
					 "param_name" => "auto_play",
					 "value" => array(
						esc_html__('No', 'cactus') => '0',
						esc_html__('Yes', 'cactus') => '1',
					 ),
					 "description" => ''
				  ),
				  array(
				    "admin_label" => true,
					"type" => "textfield",
					"heading" => esc_html__("Speed", "cactus"),
					"param_name" => "speed",
					"value" => "",
					"description" => esc_html__("(milliseconds) speed of animation", "cactus"),
				  ),
				  array(
					"admin_label" => true,
					"type" => "textfield",
					"heading" => esc_html__("Thumbnail size", "cactus"),
					"param_name" => "thumb_size",
					"value" => "",
					"description" => esc_html__("name of thumbnail size ('thumb_1x1' | 'thumb_3x2')", "cactus"),
				  ),
            ),
            "js_view" => 'VcColumnView'
        ) );
        
        //child
        vc_map( array(
            "name" => esc_html__("Slider Item", "cactus"),
            "base" => "c_slider_item",
            "content_element" => true,
            "as_child" => array('only' => 'c_slider_item'), // Use only|except attributes to limit parent (separate multiple values with comma)
            "icon" => BUSINESSHUB_SHORTCODE_PLUGIN_URL . "/shortcodes/img/c_slider_item.png",
            "params" => array(
				  array(
				  	"admin_label" => true,
					"type" => "textfield",
					"heading" => esc_html__("Image", "cactus"),
					"param_name" => "image",
					"value" => "",
					"description" => esc_html__("ID/URL of image", 'cactus'),
				  ),
				  array(
				  	"admin_label" => true,
					"type" => "textfield",
					"heading" => esc_html__("Url", "cactus"),
					"param_name" => "url",
					"value" => "",
					"description" => esc_html__("Target url", "cactus"),
				  ),
				  array(
				  	 "admin_label" => true,
					 "type" => "dropdown",
					 "holder" => "div",
					 "class" => "",
					 "heading" => esc_html__("URL target", 'cactus'),
					 "param_name" => "url_target",
					 "value" => array(
						'' => '',
						esc_html__('_blank', 'cactus') => '_blank',
					 ),
					 "description" => ''
				  ),
            )
        ) );
        
    }
	if(class_exists('WPBakeryShortCode') && class_exists('WPBakeryShortCodesContainer')){
		class WPBakeryShortCode_c_slider extends WPBakeryShortCodesContainer{}
		class WPBakeryShortCode_c_slider_item extends WPBakeryShortCode{}
	}
}
