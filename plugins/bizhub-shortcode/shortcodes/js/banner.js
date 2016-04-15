// JavaScript Document
(function() {
    tinymce.PluginManager.add('cactus_banner', function(editor, url) {
		editor.addButton('cactus_banner', {
			text: '',
			tooltip: 'Banner',
			id: 'cactus_banner_shortcode',
			icon: 'icon-banner',
			onclick: function() {
				// Open window
				editor.windowManager.open({
					title: 'Banner',
					body: [
						{type: 'textbox', name: 'image', label: 'ID of attachment or full URL of image'},
						{type: 'textbox', name: 'title', label: 'Title'},
						{type: 'textbox', name: 'sub_line', multiline: true, label: 'Sub Text'},
						{type: 'textbox', name: 'button_text', label: 'Button Text'},
						{type: 'textbox', name: 'button_url', label: 'URL of Button', value:"#"},
						{type: 'listbox',
							name: 'url_target',
							label: 'Open URL in',
							'values': [
								{text: 'Curent Tab', value: '0'},
								{text: 'New Tab', value: '1'},
							]
						},
						{type: 'textbox', name: 'overlay_color', label: 'Overlay Color - Hexa color of overlay layer'},

					],
					onsubmit: function(e) {
						var image 				= e.data.image;
						var title 				= e.data.title;
						var sub_line 			= e.data.sub_line;
						var button_text 		= e.data.button_text;
						if(button_text == ''){button_text = 'Button Text'}
						var button_url 			= e.data.button_url;
						var url_target 			= e.data.url_target;
						var overlay_color 		= e.data.overlay_color;
						editor.insertContent('[c_banner image="'+image+'" title="'+title+'" sub_line="'+sub_line+'" button_text="'+button_text+'" button_url="'+button_url+'" url_target="'+url_target+'" overlay_color="'+overlay_color+'"][/c_banner]');
					}
				});
			}
		});
	});
})();

