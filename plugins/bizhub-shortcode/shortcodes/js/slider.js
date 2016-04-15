// JavaScript Document
(function() {
    tinymce.PluginManager.add('cactus_slider', function(editor, url) {
		editor.addButton('cactus_slider', {
			text: '',
			tooltip: 'Slider',
			icon: 'icon-slider',
			id: 'cactus_slider_shortcode',
			onclick: function() {
				// Open window
				editor.windowManager.open({
					title: 'Slider',
					body: [
						{type: 'listbox', 
							name: 'post_type', 
							label: 'Post Type', 
							'values': [
								{text: 'Post', value: 'post'},
								{text: 'Portfolio', value: 'ct_portfolio'},
								{text: 'Download', value: 'download'},
								{text: 'No post type - use of image urls', value: 'url'},
							]
						},
						{type: 'textbox', name: 'ids', label: 'Ids (Specify post IDs to retrieve)'},
						{type: 'listbox', 
							name: 'items_per_slide', 
							label: 'Items per slider', 
							'values': [
								{text: '3 items', value: '3'},
								{text: '1 items', value: '1'},
								{text: '2 items', value: '2'},
								{text: '4 items', value: '4'}
							]
						},
						{type: 'textbox', name: 'count', value: '9', label: 'Count'},
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
						{type: 'textbox', name: 'meta_key', label: 'Meta key (Name of meta key for ordering)'},
						{type: 'listbox', 
							name: 'show_category', 
							label: 'Show category', 
							'values': [
								{text: 'No', value: '0'},
								{text: 'Yes', value: '1'}
							]
						},
						{type: 'listbox', 
							name: 'show_excerpt', 
							label: 'Show excerpt', 
							'values': [
								{text: 'Yes', value: '1'},
								{text: 'No', value: '0'}
							]
						},
						{type: 'listbox', 
							name: 'auto_play', 
							label: 'Auto play', 
							'values': [
								{text: 'No', value: '0'},
								{text: 'Yes', value: '1'}
							]
						},
						{type: 'textbox', name: 'speed',  label: 'Speed'},
					],
					onsubmit: function(e) {
						if(e.data.post_type!='url'){
						var uID =  Math.floor((Math.random()*100)+1);
						editor.insertContent('[c_slider post_type="'+e.data.post_type+'" taxonomy="'+e.data.taxonomy+'" taxonomy_slugs="'+e.data.taxonomy_slugs+'" ids="'+e.data.ids+'" items_per_slide="'+e.data.items_per_slide+'" count="'+e.data.count+'" order="'+e.data.order+'" orderby="'+e.data.orderby+'" meta_key="'+e.data.meta_key+'" auto_play="'+e.data.auto_play+'" speed="'+e.data.speed+'"  show_category="'+e.data.show_category+'" show_excerpt="'+e.data.show_excerpt+'"]<br class="nc"/>');
						}else{
							var number_of_slider 	= e.data.count;
							if(number_of_slider==''){ number_of_slider = 3;}
							var shortcode = '[c_slider items_per_slide="'+e.data.items_per_slide+'" auto_play="'+e.data.auto_play+'" speed="'+e.data.speed+'"]<br class="nc"/>';
							for(i=0;i<number_of_slider;i++)
							{
								shortcode+= '[c_slider_item image="ID/URL of image" url="Target url" url_target="Link target"]<br class="nc"/>';
							}
							shortcode+= '[/c_slider]<br class="nc"/>';
							// Insert content when the window form is submitted
							editor.insertContent(shortcode);
						}
					}
				});
			}
		});
	});
})();
