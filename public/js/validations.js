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

	//Validate input URL
	$('.validate-URL').click(function(){
			
		var inputs = $(this).parents('.validate-forms');	
		var urlRegister = $('#custom-modal #destiny_url').val();

		if(urlRegister != ''){
			if(urlRegister.indexOf("http") == -1){
				$('#custom-modal #destiny_url').addClass('invalid');
				$('#custom-modal #name').removeClass('invalid');

				inputs.find('#validate-danger').removeClass('hide');
				inputs.find('#validate-danger span').html('URL inválido, por favor inseir o protocolo https:// ou https://');
		        return false; 
			}else{
				$('#custom-modal #destiny_url').removeClass('invalid');
			}
		}
	});

});