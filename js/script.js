$(document).ready(function(){

	var img = $('#img');
	width = img.width();
	height = img.height();
	console.log('width : '+width+' height : '+height);

	/*
	$('#modif').on('click', function(){
		$(img).width(300).height(200);
	});
	*/

	$('#form').on('submit', function(e){
		e.preventDefault();
		newWidth = $('input[name=width]').val();
		newHeight = $('input[name=height]').val();
		if(jQuery.isNumeric(newWidth) && jQuery.isNumeric(newHeight)){
			$(img).width(newWidth).height(newHeight);
		}
		else{
			alert('Erreur, il faut 2 nombre!!!')
		}
	});

	console.log('Largeur fenêtre '+$(window).width()+' hauteur fenêtre '+$(window).height());
	console.log('Largeur document '+$(document).width()+' hauteur document '+$(document).height());
	console.log('Largeur écran '+window.screen.width+' hauteur écran '+window.screen.height);

});
