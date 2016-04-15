// JavaScript Document
(function() {
    tinymce.PluginManager.add('cactus_button', function(editor, url) {
		editor.addButton('cactus_button', {
			text: '',
			tooltip: 'Button',
			id: 'cactus_button_shortcode',
			icon: 'icon-button',
			onclick: function() {
				// Open window
				editor.windowManager.open({
					title: 'Button',
					body: [
						{type: 'textbox', name: 'text', label: 'Button Text'},
						{type: 'textbox', name: 'url', label: 'Target URL', value:"#"},
						{type: 'listbox',
							name: 'url_target',
							label: 'Open URL in',
							'values': [
								{text: 'Curent Tab', value: '0'},
								{text: 'New Tab', value: '1'},
							]
						},
						{type: 'textbox', name: 'icon', label: 'Icon class, for example "fa fa-home"', value:""},
						{type: 'listbox',
							name: 'style',
							label: 'Button Style',
							'values': [
								{text: 'Style 1 - big button, solid background with left separator', value: '1'},
								{text: 'Style 2 - big button, solid  background without separator', value: '2'},
								{text: 'Style 3 - big button, bordered', value: '3'},
								{text: 'Style 4 - small button', value: '4'},
							]
						},
						{type: 'textbox', name: 'text_color', label: 'Hexa color of text'},
						{type: 'textbox', name: 'bg_color', label: 'Hexa color of background. In style 3, it is border color'},
					],
					onsubmit: function(e) {
						var uID =  Math.floor((Math.random()*100)+1);
						var text 				= e.data.text;
						if(text == ''){ text = 'button text' }
						var url 				= e.data.url;
						var url_target 			= e.data.url_target;
						var icon 				= e.data.icon;
						var style 				= e.data.style;
						if(style != '1' && style != '2' && style != '3' && style != '4'){ style = '1' }
						var text_color 			= e.data.text_color;
						var bg_color 			= e.data.bg_color;

						// Insert content when the window form is submitted
						editor.insertContent('[c_button url="'+url+'" url_target="'+url_target+'" icon="'+icon+'" style="'+style+'" text_color="'+text_color+'" bg_color="'+bg_color+'"]'+text+'[/c_button]');
					}
				});
			}
		});
	});
})();
