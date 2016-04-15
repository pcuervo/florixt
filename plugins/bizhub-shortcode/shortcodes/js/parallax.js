// JavaScript Document
(function() {
    tinymce.PluginManager.add('cactus_parallax', function(editor, url) {
		editor.addButton('cactus_parallax', {
			text: '',
			tooltip: 'Parallax',
			id: 'cactus_parallax_shortcode',
			icon: 'icon-parallax',
			onclick: function() {
				// Open window
				editor.windowManager.open({
					title: 'Parallax',
					body: [
						{type: 'textbox', name: 'slide_item', label: 'Number of Parallax Slide'},
						{type: 'textbox', name: 'media_url', label: 'URL of background image or video'},
						{type: 'textbox', name: 'height', label: 'Height of the panel (in pixels)'},
						{type: 'listbox',
							name: 'align',
							label: 'Choose content alignment',
							'values': [
								{text: 'Center', value: 'center'},
								{text: 'Left', value: 'left'},
								{text: 'Right', value: 'right'},
							]
						},
						{type: 'textbox', name: 'heading', label: 'Heading Text'},
						{type: 'textbox', name: 'button_text', label: 'Button Text'},
						{type: 'textbox', name: 'button_text_color', label: 'Hexa color of button text'},
						{type: 'textbox', name: 'button_background_color', label: 'Hexa color of button background.'},
						{type: 'textbox', name: 'button_url', label: 'URL of button'},
						{type: 'listbox',
							name: 'url_target',
							label: 'Open URL in',
							'values': [
								{text: 'Curent Tab', value: '0'},
								{text: 'New Tab', value: '1'},
							]
						},
						{type: 'textbox', name: 'content', label: 'Slide Content', multiline: true},
					],
					onsubmit: function(e) {
						//var uID =  Math.floor((Math.random()*100)+1);
						// Insert content when the window form is submitted
						var media_url 				= e.data.media_url;
						var height 					= e.data.height;
						var align 					= e.data.align;
						var heading 				= e.data.heading;
						var button_text 			= e.data.button_text;
						var button_text_color 		= e.data.button_text_color;
						var button_background_color = e.data.button_background_color;
						var button_url 				= e.data.button_url;
						var url_target 				= e.data.url_target;
						var content 				= e.data.content;
						if(content == ''){ content = 'Slide Content';}
						var slide_item 				= e.data.slide_item;
						
						var shortcode = '[c_parallax media_url="'+media_url+'" height="'+height+'"]<br class="cactus_br"/>';
						for(i=0;i<slide_item;i++)
						{
							shortcode+= '[c_parallax_slide align="'+align+'" heading="'+heading+'" button_text="'+button_text+'" button_text_color="'+button_text_color+'" button_background_color="'+button_background_color+'"  button_url="'+button_url+'"  url_target="'+url_target+'"]'+content+'[/c_parallax_slide]<br class="cactus_br"/>';

						}
						shortcode+= '[/c_parallax]<br class="cactus_br"/>';
						// Insert content when the window form is submitted
						editor.insertContent(shortcode);
					}
				});
			}
		});
	});
})();