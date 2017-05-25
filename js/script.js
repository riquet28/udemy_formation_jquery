$(document).ready(function(){

	var article = $('#article');
	cacher = $('#cacher'); afficher = $('#afficher');

	/*
	$(cacher).on('click', function(){
		$(article).hide();
		$(this).hide();
		$(afficher).show();
	});

	$(afficher).on('click', function(){
		$(article).show();
		$(this).hide();
		$(cacher).show();
	});
	*/

	/*
	$(cacher).on('click', function(){
		$(article).fadeOut('slow');
		$(this).hide();
		$(afficher).show();
	});

	$(afficher).on('click', function(){
		$(article).fadeIn('fast');
		$(this).hide();
		$(cacher).show();
	});
	*/

	/*
	$(cacher).on('click', function(){
		$(article).slideUp('slow');
		$(this).hide();
		$(afficher).show();
	});

	$(afficher).on('click', function(){
		$(article).slideDown('fast');
		$(this).hide();
		$(cacher).show();
	});
	*/

	$(cacher).on('click', function(){
		$(article).slideToggle('fast');
	});

});
