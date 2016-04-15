// JavaScript Document
(function() {
    tinymce.PluginManager.add('cactus_iconbox', function(editor, url) {
		editor.addButton('cactus_iconbox', {
			text: '',
			tooltip: 'Icon Box',
			id: 'cactus_iconbox_shortcode',
			icon: 'icon-iconbox',
			onclick: function() {
				// Open window
				editor.windowManager.open({
					title: 'Icon Box',
					body: [
						{type: 'listbox',
							name: 'style',
							label: 'Style',
							'values': [
								{text: 'Style 1 - Column', value: '1'},
								{text: 'Style 2 - Column (Big Icon)', value: '2'},
								{text: 'Style 3 - List', value: '3'},
								{text: 'Style 4 - Grid', value: '4'},
								{text: 'Style 5 - Column with overlay icon', value: '5'},
							]
						},
						{type: 'listbox',
							name: 'item_width',
							label: 'Item Width - (required) - (values: 1/12 - 2/12 - 3/12 - 4/12)',
							'values': [
								{text: '1/12', value: '1_12'},
								{text: '2/12', value: '2_12'},
								{text: '3/12', value: '3_12'},
								{text: '4/12', value: '4_12'},
								{text: '1/5', value: '1_5'},
							]
						},
						{type: 'textbox', name: 'count', label: 'Number of Icon Box Item'},
						{type: 'textbox', name: 'icon', label: 'Icon class, for example "fa fa-home"'},
						{type: 'textbox', name: 'icon_image', label: 'ID of attachment or full URL of Image (For style 4)'},
						{type: 'textbox', name: 'title', label: 'Title of box'},
						{type: 'textbox', name: 'icon_color', label: 'Hexa color of Icon'},
						{type: 'textbox', name: 'content', label: 'Content', multiline:true},
					],
					onsubmit: function(e) {
						//var uID =  Math.floor((Math.random()*100)+1);
						var style 				= e.data.style;
						if(style == ''){ style = '1' }
						var item_width 	= e.data.item_width;
						var count 		= e.data.count;
						if(count == ''){ count = '1' }
						var icon 		= e.data.icon;
						var icon_image 	= e.data.icon_image;
						if(style == '4'){icon_image = 'icon_image="'+icon_image+'"';
						}else{icon_image= "";}
						var title 		= e.data.title;
						var icon_color 	= e.data.icon_color;
						var content 	= e.data.content;
						var shortcode = '[c_iconbox style="'+style+'" item_width="'+item_width+'"]<br class="cactus_br"/>';
						for(i=0;i<count;i++)
						{
							shortcode += '[c_iconbox_item icon="'+icon+'" '+icon_image+' title="'+title+'" icon_color="'+icon_color+'"]'+content+'[/c_iconbox_item]<br class="cactus_br"/>';
						}
						shortcode+= '[/c_iconbox]<br class="cactus_br"/>';
						// Insert content when the window form is submitted
						editor.insertContent(shortcode);
					}
				});
			}
		});
	});
})();
