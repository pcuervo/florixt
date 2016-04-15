<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package cactus
 */

$archives_header_bg_color = ot_get_option('archives_header_background');
$archives_header_bg_color = isset($archives_header_bg_color['background-color']) ? $archives_header_bg_color['background-color'] : '';
$archives_sidebar = ot_get_option('archives_sidebar','right');
if(is_category()):
	//footer
	$cat 		= get_query_var('cat');
  	$yourcat 	= get_category ($cat);
  	$cat_id  	= $yourcat->cat_ID	;
	$cat_sidebar		 			= get_option( "cat_sidebar$cat_id") ? get_option( "cat_sidebar$cat_id"):'';
	$cat_footer_cta					= get_option( "cat_footer_cta$cat_id") ? get_option( "cat_footer_cta$cat_id"):'';

	if( $cat_sidebar != '' && $cat_sidebar != 'default' ){ $archives_sidebar =  $cat_sidebar; }
endif;
get_header();
$archives_layout = ot_get_option('archives_layout','style_1');
$archives_layout_class = '';

businesshub_get_global_archives_thumb($archives_layout,$archives_sidebar);

if($archives_layout == 'style_2'){$archives_layout_class = 'style-2';}
if($archives_layout == 'style_3_thumbnail'){$archives_layout_class = 'style-3 ct-border-bottom';}
// add by T
?>
	<div id="cactus-body-container">
    	<div class="cactus-sidebar-control <?php if( $archives_sidebar!='hidden' ){ echo "sb-".$archives_sidebar; }?>"> <!-- sb-right , sb-left -->
        	<div class="container container-1340-main">
            	<div class="row">
                	<div class="<?php echo esc_attr($archives_sidebar!='hidden'?'col-md-9':'col-md-12'); ?> main-content-col">
                    	<div class="main-content-col-body">
                        	<div class="cactus-listing-wrap">
                            	<div class="cactus-listing-config <?php echo esc_attr($archives_layout_class);?>"> <!--addClass: style-1 + (style-2 -> style-n)-->
                                	<div class="cactus-sub-wrap">
											<?php if ( have_posts() ) : ?>
                                                <?php while ( have_posts() ) : the_post(); ?>
                                                    <?php
                                                        /* Include the Post-Format-specific template for the content.
                                                         * If you want to override this in a child theme, then include a file
                                                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                                         */
                                                        get_template_part( 'html/loop/content');
                                                    ?>
                                                <?php endwhile; ?>
                                            <?php else : ?>
                                                <?php get_template_part( 'html/loop/content', 'none' ); ?>
                                            <?php endif; ?>
                                    	</div><!-- .cactus-sub-wrap-->
                                	</div><!-- .cactus-listing-config -->
                            	<input type="hidden" name="archives_thumb" value="<?php echo esc_attr($archives_thumb);?>"/>
                                <div class="page-navigation"><?php businesshub_paging_nav('.cactus-sub-wrap','html/loop/content'); ?></div>
                            	</div>
                            </div>
                        </div>
					<?php if($archives_sidebar != 'hidden'){get_sidebar();} ?>
        		</div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
