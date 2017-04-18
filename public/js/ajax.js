/**
 * Created by Moisés on 17/04/2017.
 */
$( document ).ready(function() {

    //Register user
    $("#form_register_user").submit(function(event){

        event.preventDefault();

        var data = {
            name: $("input[name=name]").val(),
            company_name: $("input[name=company_name]").val(),
            email: $("input[name=email]").val(),
            telephone: $("input[name=telephone]").val(),
            password: $("input[name=password]").val(),
            token: $("input[name=_token]").val()
        }

        $.ajax({
            url: 'api/register-user',
            method: 'POST',
            data: data,
            success: function(result){
                if(result == 'register-ok'){
                    alert('Cadastro com sucesso e redirecionado para o login"');
                }
            }
        });
    });

});