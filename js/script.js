$(document).ready(function(){

	var form = $('#form'), choix = $('#choix'), sujet = $('#sujet');

	$(form).on('submit', function(e){
		e.preventDefault();
		alert('Formulaire posté');
	});

	$(sujet).on('focus', function(){
		console.log('Hey, g le focus');
	});

	$(sujet).on('blur', function(){
		console.log('Je suis sorti');
	});

	$(choix).change(function(){
		console.log($(this).val());
	});

});
