$(document).ready(function(){

	// $('#content p').text('Changement de texte !!!');
	// $('#content p').html('<span> Je suis dans une span! </span>');

	// $('#content p').text('<a href="#">Mon lien</a>');
	// $('#content p').html('<a href="#">Mon lien</a>');

	// $('#content').after('Hello World');

	// $('#content').before('<a href="#">Mon lien</a>');

	// $('#content p').append('<a href="#">Mon lien</a>');
	// $('#content p').prepend('<a href="#">Mon lien</a>');

	/*
	var url = $('a#lien').attr('href');
	alert(url);
	*/

	// $('a#lien').attr('href', 'http://yahoo.com');

	// alert($('#content').hasClass('blue'));
	// alert($('#lien').hasClass('link'));

	$('#vider').on('click', function(){
		// $('#content').empty();
		$('#content').remove();
	});

	/*
	$('#add').on('click', function(){
		if(!$('#paraph').hasClass('article')){
			$('#paraph').addClass('article');
		}
		else{
			$('#paraph').removeClass('article');
		}
	});
	*/

	$('#add').on('click', function(){
		$('#paraph').toggleClass('article');
	});

});
