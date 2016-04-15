// JavaScript Document
(function() {
    tinymce.PluginManager.add('cactus_counter', function(editor, url) {
		editor.addButton('cactus_counter', {
			text: '',
			tooltip: 'Counter',
			id: 'cactus_counter_shortcode',
			icon: 'icon-counter',
			onclick: function() {
				// Open window
				editor.windowManager.open({
					title: 'Counter',
					body: [
						{type: 'textbox', name: 'value', label: 'Value to count'},
						{type: 'textbox', name: 'text', label: 'Text', multiline: true},
						{type: 'textbox', name: 'delay', label: 'Delay - (ms) time between each step. Default is 10 (ms)'},
						{type: 'textbox', name: 'time', label: 'Time - (ms) time to finish counting. Default is 1000 (ms)'},
					],
					onsubmit: function(e) {
						//var uID =  Math.floor((Math.random()*100)+1);
						// Insert content when the window form is submitted
						editor.insertContent('[c_counter value="'+e.data.value+'" text="'+e.data.text+'" delay="'+e.data.delay+'" time="'+e.data.time+'" ][/c_counter]');
					}
				});
			}
		});
	});
})();