$(document).ready(function(){

	$('#depart, #retour').datepicker({
		dateFormat: "dd-mm-yy",
		dayNamesMin: ['Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa'],
		monthNames: ['Janvier', 'Févrre', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre']
	});

});
