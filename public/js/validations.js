$( document ).ready(function() {

	//Validate forms
	$('.validate').click(function(){
		
		var inputs = $(this).parents('.validate-forms');
		var errors = 0;
		inputs.find('input.required').each(function(){
			var that_ = $(this);
			if(that_.val() == '' || that_.val() == null || that_.val() == undefined){
				errors++;
				that_.addClass('invalid');
			}else{
				that_.removeClass('invalid');
			}
		});
		inputs.find('select.required').each(function(){
			var that_ = $(this);
			if(that_.val() == '' || that_.val() == null || that_.val() == undefined){
				errors++;
				that_.addClass('invalid');
			}else{
				that_.removeClass('invalid');
			}
		});

		if(errors > 0){
			inputs.find('#validate-danger').removeClass('hide');
			inputs.find('#validate-danger span').html('Por favor preencher os campos obrigatórios!');
            return false;            
        }
	});

});