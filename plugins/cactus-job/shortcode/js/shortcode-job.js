// JavaScript Document
(function() {
    tinymce.PluginManager.add('shortcode_jobs', function(editor, url) {
		editor.addButton('shortcode_jobs', {
			text: '',
			tooltip: 'Jobs',
			id: 'cactus_jobs_shortcode',
			icon: 'icon-jobs',
			onclick: function() {
				// Open window
				editor.windowManager.open({
					title: 'Jobs',
					body: [
						{type: 'textbox', name: 'count', label: 'Count'},
						{type: 'textbox', name: 'cats', label: 'Category (List of cat ID or slug)'},
						{type: 'listbox', 
							name: 'open_jobs', 
							label: 'Show only Open Jobs', 
							'values': [
								{text: 'No', value: ''},
								{text: 'Yes', value: '1'}
							]
						},
						{type: 'listbox', 
							name: 'show_readmore', 
							label: 'Show read more link', 
							'values': [
								{text: 'Yes', value: ''},
								{text: 'No', value: '1'}
							]
						},
						
						{type: 'textbox', name: 'readmore_text', label: 'Read More Text'},
					],
					onsubmit: function(e) {
						var uID =  Math.floor((Math.random()*100)+1);
						editor.insertContent('[c_jobs cats="'+e.data.cats+'" count="'+e.data.count+'" open_jobs="'+e.data.open_jobs+'" show_readmore="'+e.data.show_readmore+'" readmore_text="'+e.data.readmore_text+'" ]<br class="nc"/>');
					}
				});
			}
		});
	});
})();
