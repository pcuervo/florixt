// JavaScript Document
(function() {
    tinymce.PluginManager.add('cactus_shortcode_list', function(editor, url) {
		editor.addButton('cactus_shortcode_list', {
			text: '',
			tooltip: 'Shortcode',
			id: 'cactus_list_shortcode_button',
			icon: 'icons',
			onclick: function() {
				// Open window
				editor.windowManager.open({
					title: 'Shortcode',
					body: [
						{type: 'button', name: 'banner', text: 'Banner', label: 'Banner' , id: 'cactus_banner'},
						{type: 'button', name: 'blog', text: 'Blog', label: 'Blog' , id: 'cactus_blog'},
						{type: 'button', name: 'button', text: 'Button', label: 'Button' , id: 'cactus_button'},
						{type: 'button', name: 'compare_table', text: 'Compare Table', label: 'Compare Table' , id: 'cactus_compare_table'},
						{type: 'button', name: 'content_box', text: 'Content Box', label: 'Content Box' , id: 'cactus_content_box'},
						{type: 'button', name: 'coundown_timer', text: 'Time Counter', label: 'Time Counter' , id: 'cactus_countdown_timer'},
						{type: 'button', name: 'counter', text: 'Counter', label: 'Counter' , id: 'cactus_counter'},
						{type: 'button', name: 'feature_showcase', text: 'Feature Showcases', label: 'Feature Showcases' , id: 'cactus_feature_showcases'},
						{type: 'button', name: 'font_icon', text: 'Font Icon', label: 'Font Icon' , id: 'cactus_font_icon'},
						{type: 'button', name: 'heading', text: 'Heading', label: 'Heading' , id: 'cactus_heading'},
						{type: 'button', name: 'icon_box', text: 'Icon Box', label: 'Icon Box' , id: 'cactus_iconbox'},
						{type: 'button', name: 'image_showcase', text: 'Image Showcase', label: 'Image Showcase' , id: 'cactus_image_showcase'},
						{type: 'button', name: 'jobs', text: 'Jobs', label: 'Jobs' , id: 'shortcode_jobs'},
						{type: 'button', name: 'member', text: 'Member', label: 'Member' , id: 'cactus_member'},
						{type: 'button', name: 'parallax', text: 'Parallax', label: 'Parallax' , id: 'cactus_parallax'},
						{type: 'button', name: 'partners', text: 'Partners', label: 'Partners' , id: 'cactus_partners'},
						{type: 'button', name: 'post_grid', text: 'Post Grid', label: 'Post Grid' , id: 'cactus_post_grid'},
						{type: 'button', name: 'schedule', text: 'Schedule', label: 'Schedule' , id: 'cactus_schedule'},
						{type: 'button', name: 'simple_showcases', text: 'Simple Showcases', label: 'Simple Showcases' , id: 'cactus_simple_showcases'},
						{type: 'button', name: 'slider', text: 'Slider', label: 'Slider' , id: 'cactus_slider'},
						{type: 'button', name: 'story', text: 'Story', label: 'Story' , id: 'cactus_story'},
						{type: 'button', name: 'testimonials', text: 'Testimonials', label: 'Testimonials' , id: 'cactus_testimonials'},
						{type: 'button', name: 'text_shadow', text: 'Text Shadow', label: 'Text Shadow' , id: 'cactus_text_shadow'},
						{type: 'button', name: 'tooltip', text: 'Tooltip', label: 'Tooltip' , id: 'cactus_tooltip'},
					],
				});
			}
		});
	});
})();
