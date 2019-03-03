$(document).ready(function() {

	var $demo = $('#slider');
	var animation_name = 'slideInLeft';
	var add_slide = false;
	var remove_last_slide = false;
	const colors = [
		{ name: 'red' },
		{ name: 'blue' },
		{ name: 'yellow' },
		{ name: 'red' },
		{ name: 'blue' },
		{ name: 'yellow' },
		{ name: 'red' },
		{ name: 'blue' }
	];

	$demo.slider(true,animation_name,add_slide,remove_last_slide,colors,true,15000);

	$('[data-action="add-slide"]').click(function() {
		add_slide = true;
		remove_last_slide = false;
		$demo.slider(false,animation_name,add_slide,remove_last_slide,colors);
	});

	$('[data-action="remove-slide"]').click(function() {
		add_slide = false;
		remove_last_slide = true;
		$demo.slider(false,animation_name,add_slide,remove_last_slide,colors);
	});

});
