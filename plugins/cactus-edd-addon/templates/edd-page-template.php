<?php
/**
 * Template Name: EDD Page Template
 *
 * @package cactus
 */

//header
/*page meta*/	
	$page_meta_sidebar 				= get_post_meta(get_the_ID(),'page_meta_sidebar', true ); 
	
/*page meta*/

	$page_sidebar = '';
	if($page_meta_sidebar != 'default' && $page_meta_sidebar != ''){
		$page_sidebar = $page_meta_sidebar;
	}else{
		$page_sidebar = ot_get_option('page_sidebar','right'); //theme options : right, left, hidden
	}
	$template_404 = ot_get_option('404_page');
	if(($template_404 !='') && (is_page($template_404))){
		get_template_part('404'); 
		return;
	}
	
/*-----------  EDD ADDON METADATA  -----------*/
	$edd_addon_productnews_content 			= get_post_meta(get_the_ID(),'edd_addon_productnews_content', true );
	$edd_addon_custom_news_content 			= get_post_meta(get_the_ID(),'edd_addon_custom_news_content', true );
	$edd_addon_banner_area_height 			= get_post_meta(get_the_ID(),'edd_addon_banner_area_height', true );
	$edd_addon_big_banner_content 			= get_post_meta(get_the_ID(),'edd_addon_big_banner_content', true );
	$edd_addon_small_banner1_text 			= get_post_meta(get_the_ID(),'edd_addon_small_banner1_text', true );
	$edd_addon_small_banner2_text 			= get_post_meta(get_the_ID(),'edd_addon_small_banner2_text', true );
	$edd_addon_banner_area_custom_content 	= get_post_meta(get_the_ID(),'edd_addon_banner_area_custom_content', true );
	$edd_addon_banner_area 					= get_post_meta(get_the_ID(),'edd_addon_banner_area', true );

/*-----------  EDD ADDON && FRONT PAGE METADATA  -----------*/
global $meta_nav_style, $meta_header_schema, $meta_nav_opacity, $meta_enable_search;
	$meta_nav_style 				= get_post_meta(get_the_ID(),'meta_nav_style', true );
	$meta_header_schema 			= get_post_meta(get_the_ID(),'meta_header_schema', true );
	$meta_nav_opacity 				= get_post_meta(get_the_ID(),'meta_nav_opacity', true );
	$meta_enable_search 			= get_post_meta(get_the_ID(),'meta_enable_search', true );
get_header();	
?>
<div id="cactus-body-container" class="edd-addon template-full-width">    
    <div class="cactus-sidebar-control <?php if($page_sidebar!='hidden'){echo "sb-".$page_sidebar;}?>"> <!-- sb-right , sb-left -->
        <div class="container container-1340-main">
            <!--Header V4 -->
            <div class="">
                <div class="header-v4-builder">
                <!--E menu-->
                    <div class="top-content-bar dark-div">
                        <div class="top-content-bar-content">
                            <?php if (isset($edd_addon_productnews_content) && ($edd_addon_productnews_content == 'latest_productnews') ): ?>
                                <?php
                                    $args = array(
                                    'post_type'  		=> 'ct_edd_addon',
                                    'orderby'    		=> 'date',
                                    'order'      		=> 'DESC',
                                    'posts_per_page' 	=> 2	
                                );
                                $the_query = new WP_Query( $args );
                                if($the_query->have_posts()){
                                    while($the_query->have_posts()){
                                        $the_query->the_post();
                                        $product_news_tag 		= get_post_meta(get_the_ID(), 'product_news_tag', true);
                                        $product_news_tag_color = get_post_meta(get_the_ID(), 'product_news_tag_color', true);
                                        $tag_color_html = '';
                                        if( isset($product_news_tag) && $product_news_tag != '' ){
                                            if( isset($product_news_tag_color) && $product_news_tag_color != '' ){
                                                $tag_color_html .= 'style="background-color:'.$product_news_tag_color.'"';
                                            }
                                        }
                                        $enable_single_page 	=  op_get('ct_edd_addon_settings','edd-addon-single-page');
                                        if(isset($enable_single_page) && $enable_single_page == 'on'){
                                            $product_news_related 	= get_post_meta(get_the_ID(), 'product_news_related', true);
											$product_download_link	= '';
                                            $product_download_link  = get_permalink( $product_news_related );
											
                                        }
                                ?>
                                    <p><?php if( isset($product_news_tag) && $product_news_tag != '' ){ echo $product_news_tag != '' ? ('<span class="ct-note-menu large bg-m-color-2" '.$tag_color_html.'>'.$product_news_tag.'</span>') : '' ; }?>
                                    <?php 
                                        if(isset($enable_single_page) && $enable_single_page == 'off'){
                                                the_title_attribute();
                                        }else{?>
                                            <?php if( isset($product_download_link) && $product_download_link != '' ){?>
                                                <a href="<?php echo $product_download_link; ?>" title="<?php the_title_attribute(); ?>"><?php the_title_attribute(); ?></a>
                                            <?php }else {?>   
                                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title_attribute(); ?></a>
                                            <?php }?>
                                        <?php }
                                    ?>
                                    </p>
                                <?php
                                    }//while
                                    wp_reset_postdata();
                                }//if
                                ?>
                            <?php else:?>
                                <?php 
                                    if( (isset($edd_addon_custom_news_content) && ($edd_addon_custom_news_content != '')) && function_exists('businesshub_remove_wpautop') ){
                                        echo do_shortcode(businesshub_remove_wpautop($edd_addon_custom_news_content, true));
                                    }
                                ?>
                            <?php endif;?>
                        </div>
                    </div><!-- top-content-bar dark-div -->
                    <div class="side-content">
                        
                        <div class="menu-content">
                            <?php if( is_active_sidebar('edd_addon_sidemenu_sidebar') ){
                                dynamic_sidebar( 'edd_addon_sidemenu_sidebar' );	
                            }?>
                        </div><!-- menu-content -->
                        <div class="metro-content">
                            <div class="dark-div metro-details">
                                <div class="ct-shortcode-sliderv1">
                                    <?php if( isset($edd_addon_banner_area) && ($edd_addon_banner_area == 'built_in') ){?>
                                        <div class="first-child">
                                            <div class="content-item">
                                                <div class="content-padding">
                                                    <div class="absolute-img big-img">
                                                        <?php
                                                            if( isset($edd_addon_big_banner_content) && ($edd_addon_big_banner_content != '') ){
                                                                echo ' <div class="table-content"><div class="table-row-content"><div class="table-cell-content">'.do_shortcode($edd_addon_big_banner_content).'</div></div></div>';
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="last-child">
                                            <div class="content-item">
                                                <div class="content-padding">
                                                    <div class="absolute-img small-img-above">
                                                        <?php
                                                            if( (isset($edd_addon_small_banner1_text) && ($edd_addon_small_banner1_text != '')) && function_exists('businesshub_remove_wpautop') ){
                                                                echo ' <div class="table-content"><div class="table-row-content"><div class="table-cell-content">'.do_shortcode(businesshub_remove_wpautop($edd_addon_small_banner1_text, true)).'</div></div></div>';
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content-item">
                                                <div class="content-padding">
                                                    <div class="absolute-img small-img-below">
                                                        <?php
                                                            if( (isset($edd_addon_small_banner2_text) && ($edd_addon_small_banner2_text != '')) && function_exists('businesshub_remove_wpautop') ){
                                                                echo ' <div class="table-content"><div class="table-row-content"><div class="table-cell-content">'.do_shortcode(businesshub_remove_wpautop($edd_addon_small_banner2_text, true)).'</div></div></div>';
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }else{?>
                                        <!-- Custom Content -->
                                        <div class="first-child custom-content">
                                            <div class="content-item">
                                                <div class="content-padding">
                                                    <div class="absolute-img">
                                                        <?php
                                                            if( (isset($edd_addon_banner_area_custom_content) && ($edd_addon_banner_area_custom_content != '')) && function_exists('businesshub_remove_wpautop') ){
                                                                echo ' <div class="table-content"><div class="table-row-content"><div class="table-cell-content">'.do_shortcode(businesshub_remove_wpautop($edd_addon_big_banner_content, true)).'</div></div></div>';
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Custom Content -->
                                    <?php }//Banner Area?>
                                </div><!-- ct-shortcode-sliderv1 -->
                            </div>
                        </div><!-- metro-content -->
                    </div><!-- side-content -->
                </div><!-- header-v4-builder -->
            </div><!-- col-md-12 main-content-col -->
            <!--Header V4 -->
           	<div class="row">
                <div class="col-md-9 main-content-col">
                    <div class="main-content-col-body">
                         <?php 
                            while ( have_posts() ) : the_post();
                                get_template_part( 'html/single/content', 'page' );
                            endwhile;
                         ?>
                    </div>
                </div>
                <?php if($page_sidebar!='hidden'){ get_sidebar(); } ?>
            </div><!-- row -->
        </div>
    </div>
</div>            
<?php get_footer(); ?>