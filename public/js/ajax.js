$( document ).ready(function() {

    /* ****************************************
     CAMPAIGN
    **************************************** */

    //Delete campaign
    $(".delete_campaign").click(function(event){

        event.preventDefault();

        var data = {id: $(this).attr('data-id-delete')};
        var _this = $(this);
        $.ajax({
            url: "delete",
            method: "delete",
            data: data,
            success: function (result) {
                if(result == 'true'){

                    $(".alert-success").removeClass('hide');
                    $("#alert-success").html('<b>Sucesso!</b> A campanha foi removida.');

                    _this.parents(".gradeU").fadeOut("slow"); //Temporário - Refazer, pois o datatable já exclui a row

                }else{
                    $(".alert-danger").removeClass('hide')
                    $("#alert-danger").html('<b>Erro!</b> Ocorreu um erro ao tentar remover a campanha, por favor tente novamente ou entre em contato.')
                }
            }
        });
    });

    //Edit campaign
    $(".edit_campaign").click(function(event){

        event.preventDefault();

        var data = {id: $(this).attr('data-id-edit')};
        var _this = $(this);

        $.ajax({
            url: "edit",
            method: "post",
            data: data,
            success: function(result){
                if(result != 'null'){

                    var result = JSON.parse(result);
                    $('#modal_edit_campaign #id_campaign').val(result.id);
                    $('#modal_edit_campaign #name_campaign').val(result.name);

                }else{
                    $(".alert-danger").removeClass('hide')
                    $("#alert-danger").html('<b>Erro!</b> Ocorreu um erro ao tentar trazer as informações da campanha, por favor tente novamente ou entre em contato.')
                }
            }
        });
    });

    //Update campaign
    $('#form_update_campaign').click(function(){
        var data = {
            id: $('#id_campaign').val(),
            name: $('#name_campaign').val()
        };

        $.ajax({
            url: "update",
            method: "put",
            data: data,
            success: function(result){

                if(result == 'true'){
                    Custombox.close();
                    $(".alert-success").removeClass('hide')
                    $("#alert-success").html('<b>Success!</b> O nome da campanha foi editada.')
                    $('#tr_' + data.id).find('.text-name-campaign').html(data.name);
                    $('#tr_' + data.id).css({"border-left": "3px solid rgba(95, 190, 170, 0.4)"});
                }else if(result == 'false'){
                    Custombox.close();
                    $(".alert-danger").removeClass('hide')
                    $("#alert-danger").html('<b>Erro!</b> Ocorreu um erro ao tentar editar a campanha, por favor tente novamente ou entre em contato.')
                    $('#tr_' + data.id).css({"border-left": "3px solid #ebcccc"});
                }else{
                    Custombox.close();
                    $(".alert-danger").removeClass('hide')
                    $("#alert-danger").html('<b>Erro!</b> Ocorreu um erro crítico ao tentar editar a campanha, por favor tente novamente ou entre em contato.')
                    $('#tr_' + data.id).css({"border-left": "3px solid #ebcccc"});
                }

                setTimeout(function () {
                    $('#tr_' + data.id).css({"border-left": "0"});
                }, 4000);
            }
        });
    });



    /* ****************************************
     URL
     **************************************** */
    //Edit campaign
    $(".edit_url").click(function(event){

        event.preventDefault();

        var data = {id: $(this).attr('data-id-edit')};
        var _this = $(this);

        $.ajax({
            url: "edit",
            method: "post",
            data: data,
            success: function(result){
                if(result != 'null'){

                    var result = JSON.parse(result);

                    $('#modal_edit_url #id_url').val(result.id);
                    $('#modal_edit_url #description').val(result.description);
                    $('#modal_edit_url #destiny_url').val(result.destiny_url);
                    $('#modal_edit_url #short_url').val(result.short_url);

                }else{
                    Custombox.close();
                    $(".alert-danger").removeClass('hide')
                    $("#alert-danger").html('<b>Erro!</b> Ocorreu um erro ao tentar trazer as informações da campanha, por favor tente novamente ou entre em contato.')
                }
            }
        });
    });

    //Update URL
    $('#form_update_url').click(function(event){

        event.preventDefault();

        var data = {
            id:  $('#modal_edit_url #id_url').val(),
            description: $('#modal_edit_url #description').val(),
        };

        $.ajax({
            url: "update",
            method: "put",
            data: data,
            success: function(result){

                if(result == 'true'){
                    Custombox.close();
                    $(".alert-success").removeClass('hide')
                    $("#alert-success").html('<b>Success!</b> A descrição da URL foi editada.')
                    $('#tr_' + data.id).find('.text-description-url').html(data.description);
                    $('#tr_' + data.id).css({"border-left": "3px solid rgba(95, 190, 170, 0.4)"});
                }else if(result == 'false'){
                    Custombox.close();
                    $(".alert-danger").removeClass('hide')
                    $("#alert-danger").html('<b>Erro!</b> Ocorreu um erro ao tentar editar a URL, por favor tente novamente ou entre em contato.')
                    $('#tr_' + data.id).css({"border-left": "3px solid #ebcccc"});
                }else{
                    Custombox.close();
                    $(".alert-danger").removeClass('hide')
                    $("#alert-danger").html('<b>Erro!</b> Ocorreu um erro crítico ao tentar editar a URL, por favor tente novamente ou entre em contato.')
                    $('#tr_' + data.id).css({"border-left": "3px solid #ebcccc"});
                }

                setTimeout(function () {
                    $('#tr_' + data.id).css({"border-left": "0"});
                }, 4000);
            }
        });
    });

    //Delete URL
    $(".delete_url").click(function(event){

        event.preventDefault();

        var data = {id: $(this).attr('data-id-delete')};
        var _this = $(this);
        $.ajax({
            url: "delete",
            method: "delete",
            data: data,
            success: function (result) {
                if(result == 'true'){

                    $(".alert-success").removeClass('hide');
                    $("#alert-success").html('<b>Sucesso!</b> A URL foi removida.');

                    _this.parents(".gradeU").fadeOut("slow"); //Temporário - Refazer, pois o datatable já exclui a row

                }else if(result == 'false'){
                    $(".alert-danger").removeClass('hide')
                    $("#alert-danger").html('<b>Erro!</b> Ocorreu um erro ao tentar remover a campanha, por favor tente novamente ou entre em contato.')
                }else{
                    $(".alert-danger").removeClass('hide')
                    $("#alert-danger").html('<b>Erro!</b> Ocorreu um erro crítico ao tentar remover a campanha, por favor tente novamente ou entre em contato.')
                }
            }
        });
    });
});