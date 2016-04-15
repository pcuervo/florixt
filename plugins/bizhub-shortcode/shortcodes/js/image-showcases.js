// JavaScript Document
(function() {
    tinymce.PluginManager.add('cactus_image_showcase', function(editor, url) {
		editor.addButton('cactus_image_showcase', {
			text: '',
			tooltip: 'Image Showcases',
			id: 'cactus_image_showcase_shortcode',
			icon: 'icon-img-showcases',
			onclick: function() {
				// Open window
				editor.windowManager.open({
					title: 'Image Showcases',
					body: [
						{type: 'textbox', name: 'target_url', label: 'Target Url'},
						{type: 'listbox',
							name: 'url_target',
							label: 'Open URL in',
							'values': [
								{text: 'Curent Tab', value: '0'},
								{text: 'New Tab', value: '1'},
							]
						},
						{type: 'textbox', name: 'image1_url', label: 'Image 1 - ID of image attachment or full URL of image', multiline: true},
						{type: 'textbox', name: 'image2_url', label: 'Image 2 - ID of image attachment or full URL of image', multiline: true},
						
					],
					onsubmit: function(e) {
						//var uID =  Math.floor((Math.random()*100)+1);
						// Insert content when the window form is submitted
						editor.insertContent('[c_image_showcases target_url="'+e.data.target_url+'" url_target="'+e.data.url_target+'" image1_url="'+e.data.image1_url+'" image2_url="'+e.data.image2_url+'"][/c_image_showcases]');
					}
				});
			}
		});
	});
})();