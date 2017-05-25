$(document).ready(function(){

	var text = $('#text');

	/*
	$(text).on('keyup', function(){
		//alert('Touche relachée');
		alert($(this).val());
	});
*/

	/*
	$(text).on('keypress', function(){
		alert('Touche pressée');
	});
*/

	$(text).on('focusout', function(){
		alert('Sorti!!!');
	});

});
