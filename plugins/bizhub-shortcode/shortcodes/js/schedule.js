// JavaScript Document
(function() {
    tinymce.PluginManager.add('cactus_schedule', function(editor, url) {
		editor.addButton('cactus_schedule', {
			text: '',
			tooltip: 'Schedule',
			icon: 'icon-schedule',
			id: 'cactus_schedule_shortcode',
			onclick: function() {
				// Open window
				editor.windowManager.open({
					title: 'Schedule',
					body: [
						{type: 'textbox', name: 'heading', label: 'Heading Text'},
						{type: 'textbox', name: 'info', label: 'Info Text'},
						{type: 'textbox', name: 'num_item', label: 'Number of Schedule Item', value: '1'},
						
					],
					onsubmit: function(e) {
						var heading 	= e.data.heading;
						var info 		= e.data.info;
						var num_item 	= e.data.num_item;
						if(num_item == ''){num_item = 1}
						
						var shortcode = '[c_schedule]<br class="cactus_br"/>';
						for(i=0;i<num_item;i++)
						{
							shortcode+= '[c_schedule_item heading="'+heading+'" info="'+info+'"][/c_schedule_item]<br class="cactus_br"/>';
						}
						shortcode+= '[/c_schedule]<br class="cactus_br"/>';
						// Insert content when the window form is submitted
						editor.insertContent(shortcode);
					}
				});
			}
		});
	});
})();