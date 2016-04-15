String.prototype.endsWith = function(suffix) {
    return this.indexOf(suffix, this.length - suffix.length) !== -1;
};

jQuery(document).ajaxSuccess(function(e, xhr, settings) {
	var widget_id_base = 'text';
	
	/** 
	 * widget text is saved
	 */
	if(typeof settings.data !== 'undefined' && settings.data.search('action=save-widget') != -1) {
		if(settings.data.search('id_base=text') != -1 || settings.data.search('id_base=black-studio-tinymce') != -1){
			// send widget settings to server to process again
			var data = {
				'action': 'ct_save_widget_text',
				'data': settings.data
			};

			// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
			jQuery.post(ajaxurl, data, function(response) {
				// server returns nothing! (intentionally)
				// alert(response);
			});
		}
	}
});

jQuery(document).ready(function() {
	jQuery(document).on('click','#cactus_banner button',function() {
		jQuery('.mce-foot button').trigger( "click" );
		jQuery('#cactus_banner_shortcode button').trigger( "click" );
	});
	jQuery(document).on('click','#cactus_blog button',function() {
		jQuery('.mce-foot button').trigger( "click" );
		jQuery('#cactus_blog_shortcode button').trigger( "click" );
	});
	jQuery(document).on('click','#cactus_button button',function() {
		jQuery('.mce-foot button').trigger( "click" );
		jQuery('#cactus_button_shortcode button').trigger( "click" );
	});
	jQuery(document).on('click','#cactus_compare_table button',function() {
		jQuery('.mce-foot button').trigger( "click" );
		jQuery('#cactus_compare_table_shortcode button').trigger( "click" );
	});
	jQuery(document).on('click','#cactus_content_box button',function() {
		jQuery('.mce-foot button').trigger( "click" );
		jQuery('#cactus_content_box_shortcode button').trigger( "click" );
	});
	jQuery(document).on('click','#cactus_countdown_timer button',function() {
		jQuery('.mce-foot button').trigger( "click" );
		jQuery('#cactus_countdown_timer_shortcode button').trigger( "click" );
	});
	jQuery(document).on('click','#cactus_counter button',function() {
		jQuery('.mce-foot button').trigger( "click" );
		jQuery('#cactus_counter_shortcode button').trigger( "click" );
	});
	jQuery(document).on('click','#cactus_feature_showcases button',function() {
		jQuery('.mce-foot button').trigger( "click" );
		jQuery('#cactus_feature_showcases_shortcode button').trigger( "click" );
	});
	jQuery(document).on('click','#cactus_font_icon button',function() {
		jQuery('.mce-foot button').trigger( "click" );
		jQuery('#cactus_font_icon_shortcode button').trigger( "click" );
	});
	jQuery(document).on('click','#cactus_heading button',function() {
		jQuery('.mce-foot button').trigger( "click" );
		jQuery('#cactus_heading_shortcode button').trigger( "click" );
	});
	jQuery(document).on('click','#cactus_iconbox button',function() {
		jQuery('.mce-foot button').trigger( "click" );
		jQuery('#cactus_iconbox_shortcode button').trigger( "click" );
	});
	jQuery(document).on('click','#cactus_image_showcase button',function() {
		jQuery('.mce-foot button').trigger( "click" );
		jQuery('#cactus_image_showcase_shortcode button').trigger( "click" );
	});
	jQuery(document).on('click','#shortcode_jobs button',function() {
		jQuery('.mce-foot button').trigger( "click" );
		jQuery('#cactus_jobs_shortcode button').trigger( "click" );
	});
	jQuery(document).on('click','#cactus_member button',function() {
		jQuery('.mce-foot button').trigger( "click" );
		jQuery('#cactus_member_shortcode button').trigger( "click" );
	});
	jQuery(document).on('click','#cactus_parallax button',function() {
		jQuery('.mce-foot button').trigger( "click" );
		jQuery('#cactus_parallax_shortcode button').trigger( "click" );
	});
	jQuery(document).on('click','#cactus_partners button',function() {
		jQuery('.mce-foot button').trigger( "click" );
		jQuery('#cactus_partners_shortcode button').trigger( "click" );
	});
	jQuery(document).on('click','#cactus_post_grid button',function() {
		jQuery('.mce-foot button').trigger( "click" );
		jQuery('#cactus_post_grid_shortcode button').trigger( "click" );
	});
	jQuery(document).on('click','#cactus_schedule button',function() {
		jQuery('.mce-foot button').trigger( "click" );
		jQuery('#cactus_schedule_shortcode button').trigger( "click" );
	});
	jQuery(document).on('click','#cactus_simple_showcases button',function() {
		jQuery('.mce-foot button').trigger( "click" );
		jQuery('#cactus_simple_showcases_shortcode button').trigger( "click" );
	});
	jQuery(document).on('click','#cactus_slider button',function() {
		jQuery('.mce-foot button').trigger( "click" );
		jQuery('#cactus_slider_shortcode button').trigger( "click" );
	});
	jQuery(document).on('click','#cactus_story button',function() {
		jQuery('.mce-foot button').trigger( "click" );
		jQuery('#cactus_story_shortcode button').trigger( "click" );
	});
	jQuery(document).on('click','#cactus_testimonials button',function() {
		jQuery('.mce-foot button').trigger( "click" );
		jQuery('#cactus_testimonials_shortcode button').trigger( "click" );
	});
	jQuery(document).on('click','#cactus_text_shadow button',function() {
		jQuery('.mce-foot button').trigger( "click" );
		jQuery('#cactus_text_shadow_shortcode button').trigger( "click" );
	});
	jQuery(document).on('click','#cactus_tooltip button',function() {
		jQuery('.mce-foot button').trigger( "click" );
		jQuery('#cactus_tooltip_shortcode button').trigger( "click" );
	});
});
