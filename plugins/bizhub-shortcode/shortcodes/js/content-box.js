// JavaScript Document
(function() {
    tinymce.PluginManager.add('cactus_content_box', function(editor, url) {
		editor.addButton('cactus_content_box', {
			text: '',
			tooltip: 'Content Box',
			id: 'cactus_content_box_shortcode',
			icon: 'icon-content-box',
			onclick: function() {
				// Open window
				editor.windowManager.open({
					title: 'Content Box',
					body: [
						{type: 'textbox', name: 'image', label: 'Image 1 - ID of attachment or full URL of image', multiline: true},
						{type: 'textbox', name: 'title', label: 'Title',multiline: true},
						{type: 'listbox', 
							name: 'layout', 
							label: 'Select layout', 
							'values': [
								{text: 'Layout 1 - Big Thumbnail', value: 'layout_1'},
								{text: 'Layout 2 - Small Thumbnail', value: 'layout_2'},
							]
						},
						{type: 'listbox', 
							name: 'alignment', 
							label: 'Alignment - (for layout 2) left or right', 
							'values': [
								{text: 'Left', value: 'left'},
								{text: 'Right', value: 'right'},
							]
						},
						{type: 'textbox', name: 'button_text', label: 'Button Text'},
						{type: 'textbox', name: 'button_url', label: 'URL of button'},
						{type: 'listbox', 
							name: 'title_url', 
							label: 'Link in title', 
							'values': [
								{text: 'No', value: '0'},
								{text: 'Yes', value: '1'},
							]
						},
						{type: 'listbox',
							name: 'url_target',
							label: 'Open URL in',
							'values': [
								{text: 'Curent Tab', value: '0'},
								{text: 'New Tab', value: '1'},
							]
						},
						{type: 'textbox', name: 'content', label: 'Content',multiline: true},
					],
					onsubmit: function(e) {
						//var uID =  Math.floor((Math.random()*100)+1);
						// Insert content when the window form is submitted
						var image 		= e.data.image;
						var title 		= e.data.title;
						var layout 		= e.data.layout;
						var button_text	= e.data.button_text;
						var button_url 	= e.data.button_url;
						var title_url 	= e.data.title_url;
						var url_target	= e.data.url_target;
						var alignment	= e.data.alignment;
						var content		= e.data.content;
						if( content == '' ){ content = 'Content text here' }
						
						editor.insertContent('[c_contentbox image="'+image+'" title="'+title+'" layout="'+layout+'" button_text="'+button_text+'" button_url="'+button_url+'" title_url="'+title_url+'" url_target="'+url_target+'" alignment="'+alignment+'"]'+content+'[/c_contentbox]');
					}
				});
			}
		});
	});
})();
