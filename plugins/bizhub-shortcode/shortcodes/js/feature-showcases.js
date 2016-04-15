// JavaScript Document
(function() {
    tinymce.PluginManager.add('cactus_feature_showcases', function(editor, url) {
		editor.addButton('cactus_feature_showcases', {
			text: '',
			tooltip: 'Feature Showcases',
			icon: 'icon-feature-showcases',
			id: 'cactus_feature_showcases_shortcode',
			onclick: function() {
				// Open window
				editor.windowManager.open({
					title: 'Feature Showcases',
					body: [
						{type: 'textbox', name: 'num_item', label: 'Number of Feature Showcase Item', value: '1'},
						{type: 'textbox', name: 'image', label: 'Image - Image URL or ID of attachment'},
						{type: 'textbox', name: 'tag', label: 'Tag'},
						{type: 'textbox', name: 'title', label: 'Title'},
						{type: 'textbox', name: 'title_url', label: 'Title - URL (optional) enable clickable title'},
						{type: 'textbox', name: 'title_url_target', label: 'Link Target - target of URL on title (Empty or "_blank")'},
						{type: 'textbox', name: 'content', label: 'Content', multiline: true},
					],
					onsubmit: function(e) {
						//var uID =  Math.floor((Math.random()*100)+1);
						// Insert content when the window form is submitted
						var image 				= e.data.image;
						var tag 				= e.data.tag;
						var title 				= e.data.title;
						var title_url 			= e.data.title_url;
						var title_url_target 	= e.data.title_url_target;
						var content 			= e.data.content;
						var num_item 			= e.data.num_item;
						if(num_item == '' || num_item == 0){num_item = 1}
						
						var shortcode = '[c_feature_showcases]<br class="cactus_br"/>';
						for(i=0;i<num_item;i++)
						{
							shortcode+= '[c_feature_showcase image="'+image+'" tag="'+tag+'" title="'+title+'" title_url="'+title_url+'" title_url_target="'+title_url_target+'"]'+content+'[/c_feature_showcase]<br class="cactus_br"/>';
						}
						shortcode+= '[/c_feature_showcases]<br class="cactus_br"/>';
						// Insert content when the window form is submitted
						editor.insertContent(shortcode);
					}
				});
			}
		});
	});
})();