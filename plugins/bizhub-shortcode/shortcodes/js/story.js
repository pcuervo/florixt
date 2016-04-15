// JavaScript Document
(function() {
    tinymce.PluginManager.add('cactus_story', function(editor, url) {
		editor.addButton('cactus_story', {
			text: '',
			tooltip: 'Story',
			id: 'cactus_story_shortcode',
			icon: 'icon-story',
			onclick: function() {
				// Open window
				editor.windowManager.open({
					title: 'Story',
					body: [
						{type: 'listbox',
							name: 'scroll',
							label: 'Scroll - auto scroll or not',
							'values': [
								{text: 'No', value: 'no'},
								{text: 'Yes', value: 'yes'},
							]
						},
						{type: 'textbox', name: 'padding', label: 'Padding to content. Default is as designed. Value is in format "0px 0px 0px 0px" (top, right, bottom, left)'},
						{type: 'textbox', name: 'title', label: 'Title of person'},
						{type: 'textbox', name: 'avatar', label: 'Avatar - ID/URL of image', multiline: true},
						{type: 'textbox', name: 'content', label: 'Content', multiline: true},
						{type: 'textbox', name: 'num_item', label: 'Number of Story', value: '2'},
						
					],
					onsubmit: function(e) {
						var uID =  Math.floor((Math.random()*100)+1);
						var num_item 		= e.data.num_item;
						var scroll 			= e.data.scroll;
						if( scroll == ''){ scroll = 'no'}
						var padding 		= e.data.padding;
						var title 			= e.data.title;
						var avatar 			= e.data.avatar;
						var content 		= e.data.content;
						var shortcode = '[c_stories scroll="' + scroll + '" padding="' + padding + '"]<br class="cactus_br"/>';
						for(i=0;i<num_item;i++)
						{
							shortcode+= '[c_story title="'+title+'" avatar="'+avatar+'"]'+content+'[/c_story]<br class="cactus_br"/>';

						}
						shortcode+= '[/c_stories]<br class="cactus_br"/>';
						// Insert content when the window form is submitted
						editor.insertContent(shortcode);
					}
				});
			}
		});
	});
})();