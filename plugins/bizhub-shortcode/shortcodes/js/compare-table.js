// JavaScript Document
(function() {
    tinymce.PluginManager.add('cactus_compare_table', function(editor, url) {
		editor.addButton('cactus_compare_table', {
			text: '',
			tooltip: 'Compare Table',
			id: 'cactus_compare_table_shortcode',
			icon: 'icon-compare-table',
			onclick: function() {
				// Open window
				editor.windowManager.open({
					title: 'Compare Table',
					body: [
						{type: 'textbox', name: 'column', label: 'Number of column', value: '3'},
						{type: 'textbox', name: 'row', label: 'Number of row', value: '6'},
						{type: 'textbox', name: 'table_class', label: 'Table Class - Custom CSS class'},
						{type: 'textbox', name: 'id', label: 'Table ID - custom ID. If not provided, random ID is generated'},
						{type: 'textbox', name: 'column_class', label: 'Custom CSS class'},
						{type: 'listbox',
							name: 'is_special',
							label: 'Special Column',
							'values': [
								{text: 'True', value: '1'},
								{text: 'False', value: '0'},
							]
						},
						{type: 'textbox', name: 'tag_color', label: 'Color of Tag in Special Column'},
						{type: 'textbox', name: 'tag_bg', label: 'Background color of Tag in Special Column'},
						{type: 'textbox', name: 'column_size', label: 'Column Size - select between 2, 3, 4, 6. Total column_size values of all columns should equal to 12'},
						{type: 'textbox', name: 'title', label: 'Title of this column (plan)'},
						{type: 'textbox', name: 'price', label: 'Price of this plan'},
						{type: 'textbox', name: 'sub_text', label: 'Sub Text of this column'},
						{type: 'textbox', name: 'tag', label: 'Tag of this column'},
						{type: 'textbox', name: 'content', label: 'Content'},
					],
					onsubmit: function(e) {
						var uID =  Math.floor((Math.random()*1000)+1);
						var column 			= e.data.column;
						var row 			= e.data.row;
						var table_class		= e.data.table_class;
						var id 				= e.data.id;
						if( id == ''){id = "c_comparetable_"+uID; }		
						var column_class 	= e.data.column_class;
						var is_special 	= e.data.is_special;
						var tag_color 	= e.data.tag_color;
						var tag_bg 	= e.data.tag_bg;
						var column_size 	= e.data.column_size;
						if( column_size == ''){column_size = '4'; }
						var title 			= e.data.title;
						var price 			= e.data.price;
						var sub_text 		= e.data.sub_text;
						var tag 			= e.data.tag;
						var content 		= e.data.content;
						
						var shortcode = '[c_comparetable table_class="'+table_class+'" id="'+id+'"]<br class="cactus_br" />';
						for(i=0;i<column;i++)
						{
							shortcode+= '[c_column column_class="'+column_class+'" is_special="'+is_special+'" tag_color="'+tag_color+'" tag_bg="'+tag_bg+'" column_size="'+column_size+'" title="'+title+'" price="'+price+'" sub_text="'+sub_text+'"  tag="'+tag+'"]<br class="cactus_br" />';
							for(j=0; j<row; j++)
							{
								shortcode+= '[c_row]'+content+'[/c_row]<br class="cactus_br" />';
							}
							shortcode += '[/c_column]<br class="cactus_br" />';
						}
						shortcode+= '[/c_comparetable]<br class="cactus_br" />';
						// Insert content when the window form is submitted
						editor.insertContent(shortcode);
					}
				});
			}
		});
	});
})();

