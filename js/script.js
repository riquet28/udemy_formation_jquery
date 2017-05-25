$(document).ready(function(){

	var image = $('#image');

	/*
	$(image).on('click', function(){
		alert("ihoihi");
	});
	*/

	/*
	$(image).on('mouseenter', function(){
		alert("Tu rentres sur un élément");
	});
	*/


	$(image).on('mouseout', function(){
		alert("Tu sors d'un élément");
	});

});
