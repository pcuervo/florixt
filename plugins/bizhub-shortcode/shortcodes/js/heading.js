// JavaScript Document
(function() {
    tinymce.PluginManager.add('cactus_heading', function(editor, url) {
		editor.addButton('cactus_heading', {
			text: '',
			tooltip: 'Heading',
			id: 'cactus_heading_shortcode',
			icon: 'icon-heading',
			onclick: function() {
				// Open window
				editor.windowManager.open({
					title: 'Heading',
					body: [
						{type: 'listbox', 
							name: 'style', 
							label: 'Style', 
							'values': [
								{text: 'Style 1 - Left alignment with sub-line', value: '1'},
								{text: 'Style 2 - Left alignment without sub-line', value: '2'},
								{text: 'Style 3 - Center alignment with separator', value: '3'},
								{text: 'Style 4 - Center alignment without separator', value: '4'},
								{text: 'Style 5 - Center alignment with bottom-line', value: '5'},
							]
						},
						{type: 'textbox', name: 'icon', label: 'Class name of icon'},
						{type: 'textbox', name: 'sub_line', label: 'Sub-line Text',multiline: true},
						{type: 'textbox', name: 'content', label: 'Content',multiline: true},
						{type: 'textbox', name: 'separator_color', label: 'Separator Color'},
					],
					onsubmit: function(e) {
						//var uID =  Math.floor((Math.random()*100)+1);
						// Insert content when the window form is submitted
						var style		= e.data.style;
						var icon		= e.data.icon;						
						if(style == '1' || style ==' 2' || icon != ''){icon = 'icon="'+icon+'"';}else{icon = '';}
						var sub_line	= e.data.sub_line;
						if(style != '2'){sub_line = 'sub_line="'+sub_line+'"';}else{sub_line = '';}
						var content		= e.data.content;
						if( content == '' ){ content = 'Content text here' }
						
						var separator_color = e.data.separator_color;
						if(separator_color!='') {separator_color='separator_color="'+separator_color+'"';}
						editor.insertContent('[c_heading style="'+style+'" '+icon+' '+sub_line+' '+separator_color+']'+content+'[/c_heading]');
					}
				});
			}
		});
	});
})();
