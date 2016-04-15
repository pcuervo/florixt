<?php
/**
 * The Template for displaying single channel.
 *
 * @package cactus
 */
get_header();
?>

    <div id="cactus-body-container"> <!--Add class cactus-body-container for single page-->
          <div class="cactus-listing-wrap cactus-sidebar-control">
              <!--Config-->        
              <div class="cactus-listing-config style-1 style-3 style-channel"> <!--addClass: style-1 + (style-2 -> style-n)-->
              
                  <div class="container">
                      <div class="row">
                      
                          <div class="col-md-12 cactus-listing-content main-content-col"> <!--ajax div-->
                            <?php while ( have_posts() ) : the_post();
							$thumbnail_id = get_post_thumbnail_id( get_the_ID() );
							$thumb_url = wp_get_attachment_url( $thumbnail_id );
							?>
                            <div class="header-channel" style="background-image:url(<?php echo $thumb_url ?>)">                                    	
                                <div class="header-channel-content">
                                
                                    <div class="table-content">                                        		
                                        <div class="table-cell">
                                            <h1><?php the_title(); ?></h1>
                                            <!--Share-->
                                            <?php the_content(); ?>
                                            <!--Share-->
                                        </div>    
                                    </div>
                                    
                                </div>
                            </div>
                            
                                <?php
                                    // If comments are open or we have at least one comment, load up the comment template
                                    if ( (comments_open() || '0' != get_comments_number()) ) :
                                        comments_template();
                                    endif;
                                ?>

                            <?php endwhile; // end of the loop. ?>
                        </div>
                    </div><!--.row-->
                </div><!--.container-->
            </div>
        </div><!--#cactus-single-page-->
    </div><!--#cactus-body-container-->

<?php get_footer(); ?>