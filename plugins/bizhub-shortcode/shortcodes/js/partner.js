// JavaScript Document
(function() {
    tinymce.PluginManager.add('cactus_partners', function(editor, url) {
		editor.addButton('cactus_partners', {
			text: '',
			tooltip: 'Partners',
			id: 'cactus_partners_shortcode',
			icon: 'icon-partners',
			onclick: function() {
				// Open window
				editor.windowManager.open({
					title: 'Partners',
					body: [
						{type: 'textbox', name: 'logo', label: 'ID of attachment or full URL of image', multiline:true},
						{type: 'textbox', name: 'hover_text', label: 'Text to be appeared when logo is hovered'},
						{type: 'textbox', name: 'url', label: 'URL'},
						{type: 'listbox',
							name: 'url_target',
							label: 'Open URL in',
							'values': [
								{text: 'Curent Tab', value: '0'},
								{text: 'New Tab', value: '1'},
							]
						},
						{type: 'textbox', name: 'num_item', label: 'Number of Partner Logo', value: '4'},
					],
					onsubmit: function(e) {
						var logo 			= e.data.logo;
						var hover_text 		= e.data.hover_text;
						var url 			= e.data.url;
						var url_target 		= e.data.url_target;
						var num_item 		= e.data.num_item;
						var shortcode = '[c_partners]<br class="cactus_br"/>';
						for(i=0;i<num_item;i++)
						{
							shortcode+= '[c_partner logo="'+logo+'" hover_text="'+hover_text+'" url="'+url+'" url_target="'+url_target+'"][/c_partner]<br class="cactus_br"/>';
						}
						shortcode+= '[/c_partners]<br class="cactus_br"/>';

						 editor.insertContent(shortcode);

					}
				});
			}
		});
	});
})();
