// JavaScript Document
(function() {
    tinymce.PluginManager.add('cactus_blog', function(editor, url) {
		editor.addButton('cactus_blog', {
			text: '',
			tooltip: 'Blog',
			id: 'cactus_blog_shortcode',
			icon: 'icon-blog',
			onclick: function() {
				// Open window
				editor.windowManager.open({
					title: 'Blog',
					body: [
						{type: 'listbox', 
							name: 'style', 
							label: 'Style', 
							'values': [
								{text: 'Grid', value: 'grid'},
								{text: 'List', value: 'list'}
							]
						},
						{type: 'textbox', name: 'count', label: 'Count'},
						{type: 'textbox', name: 'cat', label: 'Category (List of cat ID or slug)'},
						{type: 'textbox', name: 'ids', label: 'Ids (Specify post IDs to retrieve)'},						
						{type: 'listbox', 
							name: 'order', 
							label: 'Order', 
							'values': [
								{text: 'DESC', value: 'DESC'},
								{text: 'ASC', value: 'ASC'}
							]
						},
						{type: 'listbox', 
							name: 'orderby', 
							label: 'Order by', 
							'values': [
								{text: 'Date', value: 'date'},
								{text: 'ID', value: 'ID'},
								{text: 'Author', value: 'author'},
								{text: 'Title', value: 'title'},
								{text: 'Name', value: 'name'},
								{text: 'Modified', value: 'modified'},
								{text: 'Parent', value: 'parent'},
								{text: 'Random', value: 'rand'},
								{text: 'Comment count', value: 'comment_count'},
								{text: 'Menu order', value: 'menu_order'},
								{text: 'Meta value', value: 'meta_value'},
								{text: 'Meta value num', value: 'meta_value_num'},
								{text: 'Post__in', value: 'post__in'},
								{text: 'None', value: 'none'}
							]
						},
						{type: 'textbox', name: 'meta_key', label: 'Meta key (Name of meta key for ordering)'},
					],
					onsubmit: function(e) {
						var uID =  Math.floor((Math.random()*100)+1);
						editor.insertContent('[c_blog   style="'+e.data.style+'"  cats="'+e.data.cat+'" ids="'+e.data.ids+'" count="'+e.data.count+'" order="'+e.data.order+'" orderby="'+e.data.orderby+'" meta_key="'+e.data.meta_key+'" ]<br class="nc"/>');
					}
				});
			}
		});
	});
})();
