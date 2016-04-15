// JavaScript Document
(function() {
    tinymce.PluginManager.add('cactus_member', function(editor, url) {
		editor.addButton('cactus_member', {
			text: '',
			tooltip: 'Member',
			id: 'cactus_member_shortcode',
			icon: 'icon-member',
			onclick: function() {
				// Open window
				editor.windowManager.open({
					title: 'Member',
					body: [
						{type: 'listbox', 
							name: 'style', 
							label: 'Style', 
							'values': [
								{text: 'Square', value: ''},
								{text: 'Circle', value: 'circle'}
							]
						},
						{type: 'textbox', name: 'avatar', label: 'Avatar (ID/URL of image)'},
						{type: 'textbox', name: 'name', label: 'Name of person'},
						{type: 'textbox', name: 'title', label: 'Title of person'},						
						{type: 'textbox', name: 'facebook', label: 'Facebook (Full URL to social networks)'},
						{type: 'textbox', name: 'twitter', label: 'Twitter (Full URL to social networks)'},
						{type: 'textbox', name: 'linkedin', label: 'LinkedIn (Full URL to social networks)'},
						{type: 'textbox', name: 'tumblr', label: 'Tumblr (Full URL to social networks)'},
						{type: 'textbox', name: 'google', label: 'Google-plus (Full URL to social networks)'},
						{type: 'textbox', name: 'pinterest', label: 'Pinterest (Full URL to social networks)'},
						{type: 'textbox', name: 'email', label: 'Email (Email of member)'},
						{type: 'textbox', name: 'custom_social_account_icon', label: 'Custom Social Account Icon - CSS Class Name of Social Account Icon (separated by a comma)'},
						{type: 'textbox', name: 'custom_social_account_profile', label: 'Custom Social Account Profile - URL to profile page (separated by a comma)'},
					],
					onsubmit: function(e) {
						//var uID =  Math.floor((Math.random()*100)+1);
						editor.insertContent('[c_member   style="'+e.data.style+'"  avatar="'+e.data.avatar+'" name="'+e.data.name+'" title="'+e.data.title+'" facebook="'+e.data.facebook+'" twitter="'+e.data.twitter+'" linkedin="'+e.data.linkedin+'"  tumblr="'+e.data.tumblr+'" google="'+e.data.google+'" pinterest="'+e.data.pinterest+'" email="'+e.data.email+'" custom_social_account_icon="'+e.data.custom_social_account_icon+'" custom_social_account_profile="'+e.data.custom_social_account_profile+'" ]Content of member ... [/c_member]<br class="nc"/>');
					}
				});
			}
		});
	});
})();
