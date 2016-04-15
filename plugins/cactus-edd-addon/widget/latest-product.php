<?php
class businesshub_Widget_latest_product extends WP_Widget {	

	function __construct() {
    	$widget_ops = array(
			'classname'   => 'cactus-all-post-widget', 
			'description' => esc_html__('Latest Product','cactus')
		);
    	parent::__construct('laste-product-widget', esc_html__('BusinessHub - Latest Product','cactus'), $widget_ops);
	}


	function widget($args, $instance) {
		
		ob_start();
		extract($args);
		
		$ids 			= empty($instance['ids']) ? '' : $instance['ids'];
		$title 			= empty($instance['title']) ? '' : $instance['title'];
		$title          = apply_filters('widget_title', $title);
		$cats 			= empty($instance['cats']) ? '' : $instance['cats'];
		$tags 			= empty($instance['tags']) ? '' : $instance['tags'];
		$number 		= empty($instance['number']) ? 3 : $instance['number'];
		if($ids!=''){
			$ids = explode(",", $ids);
			$gc = array();
			foreach ( $ids as $grid_id ) {
				array_push($gc, $grid_id);
			}
			$args = array(
				'post_type' => 'download',
				'posts_per_page' => $number,
				'order' => 'DESC',
				'post_status' => 'publish',
				'post__in' =>  $gc,
				'ignore_sticky_posts' => 1,
			);
		} else {
		  	//tags
		  	if($tags!=''){
				$tags = explode(",",$tags);
				if(is_numeric($tags[0])){$field_tag = 'term_id'; }
				else{ $field_tag = 'slug'; }
				if(count($tags)>1){
					  $texo = array(
						  'relation' => 'OR',
					  );
					  foreach($tags as $iterm) {
						  $texo[] = 
							  array(
								  'taxonomy' => 'download_tag',
								  'field' => $field_tag,
								  'terms' => $iterm,
							  );
					  }
				  }else{
					  $texo = array(
						  array(
								  'taxonomy' => 'download_tag',
								  'field' => $field_tag,
								  'terms' => $tags,
							  )
					  );
				}
			}
			//cats
			if($cats!=''){
				$cats = explode(",",$cats);
				if(is_numeric($cats[0])){$field = 'term_id'; }
				else{ $field = 'slug'; }
				if(count($cats)>1){
					  $texo = array(
						  'relation' => 'OR',
					  );
					  foreach($cats as $iterm) {
						  $texo[] = 
							  array(
								  'taxonomy' => 'download_category',
								  'field' => $field,
								  'terms' => $iterm,
							  );
					  }
				  }else{
					  $texo = array(
						  array(
								  'taxonomy' => 'download_category',
								  'field' => $field,
								  'terms' => $cats,
							  )
					  );
				}
			}
			
			$args = array(
				'post_type' => 'download',
				'posts_per_page' => $number,
				'orderby' => 'date',
				'order' => 'DESC',
				'post_status' => 'publish',
			);
			if(isset($texo)){
				$args += array('tax_query' => $texo);
			}
		}
		$the_query = new WP_Query( $args );
		echo $before_widget;
		if ( $title ) echo $before_title . $title . $after_title; 
		if($the_query->have_posts()):
			echo '<div class="cactus-widget-posts">';
				while($the_query->have_posts()): $the_query->the_post();
					?><div class="cactus-widget-posts-item">
						<?php if ( function_exists( 'has_post_thumbnail' ) && has_post_thumbnail( get_the_ID() ) ) : ?>
                        <div class="widget-picture">
                            <div class="widget-picture-content"> <a title="<?php the_title_attribute();?>" href="<?php echo esc_url(get_permalink());?>">
                              <?php echo businesshub_thumbnail('businesshub_latestpost_widget');?>                            
                              </a>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="cactus-widget-posts-content">
                          <span class="product-price">
                              <?php
                              $variable_prices = edd_get_variable_prices( get_the_ID() );
                              if( !edd_has_variable_prices( get_the_ID()) ) {
                                  $price = get_post_meta(get_the_ID(),'edd_price', true );
                                  if($price ==0){
                                      $free_text = ot_get_option('free_text');
                                      if($free_text!=''){
                                          echo esc_attr($free_text);
                                      }else{
                                          esc_html_e('Free','cactus');
                                      }
                                  }else{
                                      edd_price(get_the_ID());
                                  }
                              }else{
                                  echo edd_price_range( get_the_ID()); 
                              }
                              ?>
                          </span>
                          <h3 class="h6 widget-posts-title"> <a href="<?php echo esc_url(get_permalink());?>" title="<?php the_title_attribute();?>"><?php the_title();?></a></h3>                                      
                        </div>
					</div>
                    <?php
				endwhile;
			echo '</div>';
		endif;
		echo $after_widget;
		wp_reset_postdata();
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['ids'] = strip_tags($new_instance['ids']);
		$instance['tags'] = strip_tags($new_instance['tags']);
        $instance['cats'] = strip_tags($new_instance['cats']);
		$instance['number'] = absint($new_instance['number']);
		return $instance;
	}
	
	
	
	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : esc_html__('Latest Product','cactus');
		$ids = isset($instance['ids']) ? esc_attr($instance['ids']) : '';
		$cats = isset($instance['cats']) ? esc_attr($instance['cats']) : '';
		$tags = isset($instance['tags']) ? esc_attr($instance['tags']) : '';
		$number = isset($instance['number']) ? absint($instance['number']) : 3;?>
        
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:','cactus'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
      	<!-- /**/-->
        <p>
          <label for="<?php echo $this->get_field_id('ids'); ?>"><?php esc_html_e('ID list show:','cactus'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('ids'); ?>" name="<?php echo $this->get_field_name('ids'); ?>" type="text" value="<?php echo $ids; ?>" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('tags'); ?>"><?php esc_html_e('Tags:','cactus'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('tags'); ?>" name="<?php echo $this->get_field_name('tags'); ?>" type="text" value="<?php echo $tags; ?>" />
        </p>
      	<!-- /**/-->        
        <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php esc_html_e('Number of posts:','cactus'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
		<!--//-->
         <p>
          <label for="<?php echo $this->get_field_id('cats'); ?>"><?php esc_html_e('Categories : (ID or Slug. Ex: 1, 2)','cactus'); ?></label> 
          <textarea rows="4" class="widefat" cols="46" id="<?php echo $this->get_field_id('cats'); ?>" name="<?php echo $this->get_field_name('cats'); ?>"><?php echo $cats; ?></textarea>

        </p>
<?php
	}
}

// register widget
add_action( 'widgets_init', create_function( '', 'return register_widget("businesshub_Widget_latest_product");' ) );
?>