// JavaScript Document
(function() {
    tinymce.PluginManager.add('cactus_testimonials', function(editor, url) {
		editor.addButton('cactus_testimonials', {
			text: '',
			tooltip: 'Testimonials',
			id: 'cactus_testimonials_shortcode',
			icon: 'icon-testimonials',
			onclick: function() {
				// Open window
				editor.windowManager.open({
					title: 'Story',
					body: [
						{type: 'textbox', name: 'scroll', label: 'Scroll - auto scroll the testimonial slideshow or not- default is 0/false'},
						{type: 'textbox', name: 'name', label: 'Name of person'},
						{type: 'textbox', name: 'title', label: 'Title of person'},
						{type: 'textbox', name: 'avatar', label: 'Avatar - ID/URL of image', multiline: true},
						{type: 'textbox', name: 'rate', label: 'Number of Stars', value: ''},
						{type: 'textbox', name: 'content', label: 'Content', multiline: true},
						{type: 'textbox', name: 'num_item', label: 'Number of Testimonial Item', value: '2'},
						
					],
					onsubmit: function(e) {
						var uID =  Math.floor((Math.random()*100)+1);
						var scroll 		= e.data.scroll;
						var name 		= e.data.name;
						var title 		= e.data.title;
						var avatar 		= e.data.avatar;
						var rate 		= e.data.rate;
						var content 	= e.data.content;
						var num_item 	= e.data.num_item;
						
						var shortcode = '[c_testimonials scroll="' + scroll + '"]<br class="cactus_br"/>';
						for(i=0;i<num_item;i++)
						{
							shortcode+= '[c_testimonial name="'+name+'" title="'+title+'" avatar="'+avatar+'" rate="'+rate+'"]'+content+'[/c_testimonial]<br class="cactus_br"/>';

						}
						shortcode+= '[/c_testimonials]<br class="cactus_br"/>';
						// Insert content when the window form is submitted
						editor.insertContent(shortcode);
					}
				});
			}
		});
	});
})();