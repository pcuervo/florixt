<?php
class businesshub_Widget_Product_Search extends WP_Widget {	

	function __construct() {
    	$widget_ops = array(
			'classname'   => 'course_search_widget', 
			'description' => esc_html__('Product Search ','cactus')
		);
    	parent::__construct('product-search-widget', esc_html__('BusinessHub - Product Search ','cactus'), $widget_ops);
	}


	function widget($args, $instance) {
		$cache = wp_cache_get('widget_product_search', 'widget');		
		if ( !is_array($cache) )
			$cache = array();

		if ( !isset( $argsxx['widget_id'] ) )
			$argsxx['widget_id'] = $this->id;
		if ( isset( $cache[ $argsxx['widget_id'] ] ) ) {
			echo $cache[ $argsxx['widget_id'] ];
			return;
		}

		ob_start();
		extract($args);
		
		$ids 			= empty($instance['ids']) ? '' : $instance['ids'];
		$title 			= empty($instance['title']) ? '' : $instance['title'];
		$title          = apply_filters('widget_title', $title);
		$cats 			= empty($instance['cats']) ? '' : $instance['cats'];

		
		$args = array(
			'hide_empty'        => false, 
			'include'           => explode(",",$cats)
		); 
		
		$terms = get_terms('download_category', $args);
		
		echo $before_widget;
		if ( $title ) echo $before_title . $title . $after_title; ?>
        <div class="cactus-widget-posts">
        <form method="get" id="searchform" class="product-search-form" action="<?php echo home_url(); ?>/">
        	<div class="input-group">
            
            <?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){ ?>
              <div class="input-group-btn product-search-dropdown">
                <button name="u_course_cat" type="button" class="btn btn-default dropdown-toggle product-search-dropdown-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="button-label"><?php esc_html_e('All','cactus'); ?></span> <span class="fa fa-angle-down"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#" data-value=""><?php esc_html_e('All','cactus'); ?></a></li>
                  <?php 
				  foreach ( $terms as $term ) {
				  	echo '<li><a href="#" data-value="'. $term->slug .'">'. $term->name .'</a></li>';
				  }
				  ?>
                </ul>
              </div><!-- /btn-group -->
            <?php } //if have terms ?>
            
              <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="<?php esc_html_e('SEARCH','cactus'); ?>" class="form-control" />
              <input type="hidden" name="post_type" value="download" />
              <input type="hidden" name="download_category" class="product-search-cat" value="" />
              <span class="input-group-btn">
              	<button type="submit" id="searchsubmit" class="btn btn-default u-course-search-submit" ><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        </div>
        <script>
		jQuery(document).ready(function(e) {
            jQuery(".product-search-dropdown").on('click', 'li a', function(){
			  jQuery(".product-search-dropdown-button .button-label").html(jQuery(this).text());
			  jQuery(".product-search-cat").val(jQuery(this).data('value'));
			  jQuery(".product-search-dropdown").removeClass('open');
			  return false;
			});
        });
		</script>
        <?php
		echo $after_widget;
		
		$cache[$argsxx['widget_id']] = ob_get_flush();
		wp_cache_set('widget_lastest_course', $cache, 'widget');
	}
	
	function flush_widget_cache() {
		wp_cache_delete('widget_custom_type_posts', 'widget');
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['cats'] = strip_tags($new_instance['cats']);
		return $instance;
	}
	
	
	
	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$cats = isset($instance['cats']) ? esc_attr($instance['cats']) : '';?>
        
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:','cactus'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
      	<!-- /**/-->
        <p>
          <label for="<?php echo $this->get_field_id('cats'); ?>"><?php esc_html_e('Included Categories (IDs. Ex: 68, 86)','cactus'); ?></label> 
          <textarea rows="4" cols="46" id="<?php echo $this->get_field_id('cats'); ?>" name="<?php echo $this->get_field_name('cats'); ?>"><?php echo $cats; ?></textarea>
        </p>
<?php
	}
}

// register widget
add_action( 'widgets_init', create_function( '', 'return register_widget("businesshub_Widget_Product_Search");' ) );
