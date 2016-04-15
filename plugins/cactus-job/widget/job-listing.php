<?php
class businesshub_Widget_Latest_Job extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'classname' => 'cactus-all-post-widget w-jobs', 'description' => "" );
		parent::__construct('job-listing', esc_html__('BusinessHub - Job listing','cactus'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract( $args );

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? esc_html__( 'Jobs listing','cactus' ) : $instance['title'], $instance, $this->id_base );
		$ids 			= empty($instance['ids']) ? '' : $instance['ids'];
		$cats 			= empty($instance['cats']) ? '' : $instance['cats'];
		$count = $instance['count'] != '' ? $instance['count'] : '3';

		$the_query = job_shortcode_query($cats,$ids,$count,$order='',$orderby='',$date_expired=0);
		if($the_query->have_posts()):
			echo $before_widget;
			if ( $title )
				echo $before_title . $title . $after_title;
			?>
            <div class="cactus-widget-posts">
				<?php 
                while($the_query->have_posts()): $the_query->the_post();?>
                    <div class="cactus-widget-posts-item">                                    
                      <div class="cactus-widget-posts-content">
                        <div class="categories">
                          <i class="fa fa-map-marker"></i>
                          <span class="cactus-note-cat"><?php echo esc_attr(get_post_meta(get_the_ID(),'job-location', true ));?></span>
                        </div>
                        <h3 class="h6 widget-posts-title"> <a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"> <?php the_title(); ?></a></h3>                                      
                      </div>
                    </div>
                <?php 
                endwhile;
                wp_reset_postdata();?> 
            </div>   
			<?php
			echo $after_widget;
		endif;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['ids'] = strip_tags($new_instance['ids']);
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['count'] = absint($new_instance['count']);
		$instance['cats'] = strip_tags($new_instance['cats']);
		return $instance;
	}

	function form( $instance ) {
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = esc_attr( $instance['title'] );
		$count = isset($instance['count']) ? absint($instance['count']) : 3;
		$cats = isset($instance['cats']) ? esc_attr($instance['cats']) : '';
?>
		<p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e( 'Title:','cactus' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p>
		<label for="<?php echo esc_attr($this->get_field_id('count')); ?>"><?php esc_html_e( 'Number of posts','cactus' ); ?></label>
		<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('count')); ?>" name="<?php echo esc_attr($this->get_field_name('count')); ?>" value="<?php echo esc_attr($count); ?>" /></p>
        <p>
        <label for="<?php echo esc_attr($this->get_field_id('cats')); ?>"><?php esc_html_e('Categories : (Category ID or Slug)','cactus'); ?></label> 
        <textarea class="widefat" rows="4" cols="46" id="<?php echo esc_attr($this->get_field_id('cats')); ?>" name="<?php echo esc_attr($this->get_field_name('cats')); ?>"><?php echo esc_attr($cats); ?></textarea>
        </p>

<?php
	}

}
add_action( 'widgets_init', create_function( '', 'return register_widget("businesshub_Widget_Latest_Job");' ) );