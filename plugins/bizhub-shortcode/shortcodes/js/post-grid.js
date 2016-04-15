// JavaScript Document
(function() {
    tinymce.PluginManager.add('cactus_post_grid', function(editor, url) {
		editor.addButton('cactus_post_grid', {
			text: '',
			tooltip: 'Post Grid',
			id: 'cactus_post_grid_shortcode',
			icon: 'icon-grid',
			onclick: function() {
				// Open window
				editor.windowManager.open({
					title: 'Post Grid',
					body: [
						{type: 'listbox', 
							name: 'post_type', 
							label: 'Post Type', 
							'values': [
								{text: 'Post', value: 'post'},
								{text: 'Portfolio', value: 'ct_portfolio'},
								{text: 'Download', value: 'download'},
							]
						},
						{type: 'listbox', 
							name: 'style', 
							label: 'Style', 
							'values': [
								{text: 'Style 1 (no space between items)', value: ''},
								{text: 'Style 2 (with space between items)', value: '2'}
							]
						},
						{type: 'textbox', name: 'ids', label: 'Ids (Specify post IDs to retrieve)'},
						{type: 'listbox', 
							name: 'items_per_row', 
							label: 'Items per row', 
							'values': [
								{text: '5 items', value: '5'},
								{text: '4 items', value: '4'},
								{text: '3 items', value: '3'}
							]
						},
						{type: 'textbox', name: 'row', value: '1', label: 'Row'},
						{type: 'listbox', 
							name: 'taxonomy', 
							label: 'Taxonomy', 
							'values': [
								{text: 'Category', value: ''},
								{text: 'Portfolio Category', value: 'portfolio_cat'},
								{text: 'Download Category', value: 'download_category'}
							]
						},
						{type: 'textbox', name: 'taxonomy_slugs', label: 'Taxonomy slugs'},
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
						{type: 'listbox', 
							name: 'show_category', 
							label: 'Show category', 
							'values': [
								{text: 'Yes', value: '1'},
								{text: 'No', value: '0'}
							]
						},
						{type: 'listbox', 
							name: 'show_excerpt', 
							label: 'Show excerpt', 
							'values': [
								{text: 'No', value: '0'},
								{text: 'Yes', value: '1'}
							]
						},
						{type: 'textbox', name: 'thumb_size', value: 'thumb_3x2', label: 'Thumbnail size'},
					],
					onsubmit: function(e) {
						var uID =  Math.floor((Math.random()*100)+1);
						editor.insertContent('[c_grid post_type="'+e.data.post_type+'" style="'+e.data.style+'" taxonomy="'+e.data.taxonomy+'" taxonomy_slugs="'+e.data.taxonomy_slugs+'" ids="'+e.data.ids+'" items_per_row="'+e.data.items_per_row+'" row="'+e.data.row+'" order="'+e.data.order+'" orderby="'+e.data.orderby+'" thumb_size="'+e.data.thumb_size+'" show_category="'+e.data.show_category+'" show_excerpt="'+e.data.show_excerpt+'"]<br class="nc"/>');
					}
				});
			}
		});
	});
})();
