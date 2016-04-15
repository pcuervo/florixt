// JavaScript Document
(function() {
    tinymce.PluginManager.add('cactus_simple_showcases', function(editor, url) {
		editor.addButton('cactus_simple_showcases', {
			text: '',
			tooltip: 'Simple Showcase',
			icon: 'icon-simple-showcase',
			id: 'cactus_simple_showcases_shortcode',
			onclick: function() {
				// Open window
				editor.windowManager.open({
					title: 'Simple Showcase',
					body: [
						{type: 'textbox', name: 'count', label: 'Number of item'},
						{type: 'textbox', name: 'title', label: 'Title of item'},
						{type: 'textbox', name: 'title_color', label: 'hexa/rgba -(optional) color of title'},
						{type: 'textbox', name: 'background_color', label: 'background color of item (hexa)'},
						{type: 'textbox', name: 'background_image', label: 'background url/id of item'},
						{type: 'textbox', name: 'content', label: 'Content', multiline: true},
						{type: 'textbox', name: 'content_color', label: 'hexa/rgba -(optional) color of content'},
						
					],
					onsubmit: function(e) {
						var uID =  Math.floor((Math.random()*100)+1);
						var count 				= e.data.count;
						if(count == ''){count = '1'};
						var title 				= e.data.title;
						var title_color			= e.data.title_color;
						var background_color 	= e.data.background_color;
						var background_image 	= e.data.background_image;
						var content 			= e.data.content;
						var content_color		= e.data.content_color;
						if(content == ''){content = 'content'};
						
						var shortcode = '[c_simple_showcases]<br class="cactus_br"/>';
						for(i=0;i<count;i++)
						{
							shortcode+= '[c_simple_showcase title="'+title+'" title_color="'+title_color+'" background_color="'+background_color+'" background_image="'+background_image+'" content_color="'+content_color+'"]'+content+'[/c_simple_showcase]<br class="cactus_br"/>';

						}
						shortcode+= '[/c_simple_showcases]<br class="cactus_br"/>';
						// Insert content when the window form is submitted
						editor.insertContent(shortcode);
					}
				});
			}
		});
	});
})();