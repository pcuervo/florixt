// JavaScript Document
(function() {
    tinymce.PluginManager.add('cactus_font_icon', function(editor, url) {
		editor.addButton('cactus_font_icon', {
			text: '',
			tooltip: 'Font Icon',
			id: 'cactus_font_icon_shortcode',
			icon: 'icon-icon',
			onclick: function() {
				// Open window
				editor.windowManager.open({
					title: 'Font Icon',
					body: [
						{type: 'textbox', name: 'name', label: 'Icon Class, for example "fa fa-home"'},
					],
					onsubmit: function(e) {
						//var uID =  Math.floor((Math.random()*100)+1);
						// Insert content when the window form is submitted
						editor.insertContent('[c_icon name="'+e.data.name+'"]');
					}
				});
			}
		});
	});
})();