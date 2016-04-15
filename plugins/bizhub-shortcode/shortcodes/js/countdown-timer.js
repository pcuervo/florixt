// JavaScript Document
(function() {
    tinymce.PluginManager.add('cactus_countdown_timer', function(editor, url) {
		editor.addButton('cactus_countdown_timer', {
			text: '',
			tooltip: 'Countdown Timer',
			id: 'cactus_countdown_timer_shortcode',
			icon: 'icon-countdown-timer',
			onclick: function() {
				// Open window
				editor.windowManager.open({
					title: 'Countdown Timer',
					body: [
						{type: 'textbox', name: 'years', label: 'Years'},
						{type: 'textbox', name: 'months', label: 'Months'},
						{type: 'textbox', name: 'days', label: 'Days'},
						{type: 'textbox', name: 'hours', label: 'Hours'},
						{type: 'textbox', name: 'minutes', label: 'Minutes'},
						{type: 'textbox', name: 'seconds', label: 'Seconds'},
						{type: 'textbox', name: 'years_text', label: '"Years" Text'},
						{type: 'textbox', name: 'months_text', label: '"Months" Text'},
						{type: 'textbox', name: 'days_text', label: '"Days" Text'},
						{type: 'textbox', name: 'hours_text', label: '"Hours" Text'},
						{type: 'textbox', name: 'minutes_text', label: '"Minutes" Text'},
						{type: 'textbox', name: 'seconds_text', label: '"Seconds" Text'},
					],
					onsubmit: function(e) {
						editor.insertContent('[c_timer years="'+e.data.years+'" years_text="'+e.data.years_text+'" months="'+e.data.months+'" months_text="'+e.data.months_text+'" days="'+e.data.days+'" days_text="'+e.data.days_text+'" hours="'+e.data.hours+'" hours_text="'+e.data.hours_text+'" minutes="'+e.data.minutes+'" minutes_text="'+e.data.minutes_text+'" seconds="'+e.data.seconds+'" seconds_text="'+e.data.seconds_text+'"][/c_timer]');
					}
				});
			}
		});
	});
})();