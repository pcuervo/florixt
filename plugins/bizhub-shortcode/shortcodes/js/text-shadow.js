// JavaScript Document
(function() {
    tinymce.PluginManager.add('cactus_text_shadow', function(editor, url) {
		editor.addButton('cactus_text_shadow', {
			text: '',
			tooltip: 'Text Shadow',
			id: 'cactus_text_shadow_shortcode',
			icon: 'icon-text-shadow',
			onclick: function() {
				// Open window
				editor.windowManager.open({
					title: 'Text Shadow',
					body: [
						{type: 'textbox', name: 'color', label: 'Shadow Color'},
						{type: 'textbox', name: 'offset', label: 'Shadow Offset'},
					],
					onsubmit: function(e) {
						editor.insertContent('[c_text_shadow color="'+e.data.color+'" offset="'+e.data.offset+'"][/c_text_shadow]');
					}
				});
			}
		});
	});
})();