$( document ).ready(function() {

    /* ****************************************
     CAMPAIGN
    **************************************** */
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
                    $("#register .alert-danger").removeClass('hide')
                    $("#register .alert-danger span").html('<b>Erro!</b> Ocorreu um erro ao tentar trazer as informações da campanha, por favor tente novamente ou entre em contato.')
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

                $(".alert").addClass('hide');

                if(result == 'register-ok'){
                    Custombox.close();
                    $("#register .alert-success").removeClass('hide')
                    $("#register .alert-success span").html('<b>Success!</b> O nome da campanha foi editada.')
                    $('#tr_' + data.id).find('.text-name-campaign').html(data.name);
                    $('#tr_' + data.id).css({"border-left": "3px solid rgba(95, 190, 170, 0.4)"});
                }else if(result == 'name-existing'){
                    $("#modal_edit_campaign .alert-warning").removeClass('hide')
                    $("#modal_edit_campaign .alert-warning span").html('<b>Atenção!</b> Não foi possível alterar o nome da campanha, pois já existe outra campanha com o mesmo nome.')
                }else{
                    Custombox.close();
                    $("#register .alert-danger").removeClass('hide')
                    $("#register .alert-danger span").html('<b>Erro!</b> Ocorreu um erro crítico ao tentar editar a campanha, por favor tente novamente ou entre em contato.')
                    $('#tr_' + data.id).css({"border-left": "3px solid #ebcccc"});
                }

                $(".alert-php").addClass('hide');

                setTimeout(function () {
                    $('#tr_' + data.id).css({"border-left": "0"});
                }, 4000);
            }
        });
    });

    //Delete campaign
    $(".delete_campaign").click(function(event){

        event.preventDefault();

        if(!confirm('Realmente deseja excluir esta campanha?')){
            return false;
        }

        var data = {id: $(this).attr('data-id-delete')};
        var _this = $(this);

        $.ajax({
            url: "delete",
            method: "delete",
            data: data,
            success: function (result) {

                $(".alert").addClass('hide');

                if(result == 'delete-true'){

                    $("#register .alert-success").removeClass('hide');
                    $("#register .alert-success span").html('<b>Sucesso!</b> A campanha foi removida.');

                    _this.parents(".gradeU").fadeOut("slow"); //Temporário - Refazer, pois o datatable já exclui a row

                }else{
                    $("#register .alert-danger").removeClass('hide')
                    $("#register .alert-danger span").html('<b>Erro!</b> Ocorreu um erro ao tentar remover a campanha, por favor tente novamente ou entre em contato.')
                }

                $(".alert-php").addClass('hide');
            }
        });
    });


     /* ****************************************
     INFLUENCER
     **************************************** */
    //Edit influencer
    $(".edit_influencer").click(function(event){

        event.preventDefault();

        var data = {id: $(this).attr('data-id-edit')};
        var _this = $(this);

        $.ajax({
            url: "/campanha/influencer/edit",
            method: "post",
            data: data,
            success: function(result){
                if(result != 'null'){

                    var result = JSON.parse(result);
                    $('#modal_edit_influencer #id_influencer').val(result.id);
                    $('#modal_edit_influencer #id_campaign').val(result.id_campaign);
                    $('#modal_edit_influencer #name_influencer').val(result.name);

                }else{
                    $("#register .alert-danger").removeClass('hide')
                    $("#register .alert-danger span").html('<b>Erro!</b> Ocorreu um erro ao tentar trazer as informações do influenciador, por favor tente novamente ou entre em contato.')
                }
            }
        });
    });

    //Update influencer
    $('#form_update_influencer').click(function(){
        var data = {
            id: $('#id_influencer').val(),
            id_campaign: $('#id_campaign').val(),
            name: $('#name_influencer').val()
        };

        $.ajax({
            url: "/campanha/influencer/update",
            method: "put",
            data: data,
            success: function(result){

                $(".alert").addClass('hide');

                if(result == 'update-true'){
                    Custombox.close();
                    $("#register .alert-success").removeClass('hide')
                    $("#register .alert-success span").html('<b>Success!</b> O nome do influenciador foi editado.')
                    $('#tr_' + data.id).find('.text-name-influencer').html(data.name);
                    $('#tr_' + data.id).css({"border-left": "3px solid rgba(95, 190, 170, 0.4)"});
                }else if(result == 'name-existing'){
                    $("#modal_edit_influencer .alert-warning").removeClass('hide')
                    $("#modal_edit_influencer .alert-warning span").html('<b>Atenção!</b> Não foi possível alterar o nome do influenciador, pois já existe outro influenciador com o mesmo nome.')
                }else{
                    Custombox.close();
                    $("#register .alert-danger").removeClass('hide')
                    $("#register .alert-danger span").html('<b>Erro!</b> Ocorreu um erro crítico ao tentar editar o influenciador, por favor tente novamente ou entre em contato.')
                    $('#tr_' + data.id).css({"border-left": "3px solid #ebcccc"});
                }

                $(".alert-php").addClass('hide');

                setTimeout(function () {
                    $('#tr_' + data.id).css({"border-left": "0"});
                }, 4000);
            }
        });
    });

    //Delete influencer
    $(".delete_influencer").click(function(event){

        event.preventDefault();

        if(!confirm('Realmente deseja excluir este influenciador?')){
            return false;
        }

        var data = {id: $(this).attr('data-id-delete')};
        var _this = $(this);

        $.ajax({
            url: "/campanha/influencer/delete",
            method: "delete",
            data: data,
            success: function (result) {

                $(".alert").addClass('hide');

                if(result == 'delete-true'){

                    $("#register .alert-success").removeClass('hide');
                    $("#register .alert-success span").html('<b>Sucesso!</b> O influenciador foi removido.');

                    _this.parents(".gradeU").fadeOut("slow");

                }else{
                    $("#register .alert-danger").removeClass('hide')
                    $("#register .alert-danger span").html('<b>Erro!</b> Ocorreu um erro ao tentar remover o influenciador, por favor tente novamente ou entre em contato.')
                }

                $(".alert-php").addClass('hide');
            }
        });
    });


     /* ****************************************
     URL
     **************************************** */
     //Edit URL
     $(".edit_url").click(function(event){

        event.preventDefault();

        var data = {id: $(this).attr('data-id-edit')};
        var _this = $(this);

        $.ajax({
            url: "/campanha/url/edit",
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
                    $("#register-url .alert-danger").removeClass('hide')
                    $("#register-url .alert-danger span").html('<b>Erro!</b> Ocorreu um erro ao tentar trazer as informações da campanha, por favor tente novamente ou entre em contato.')
                }
            }
        });
     });

     //Update URL
     $('#form_update_url').click(function(event){

        event.preventDefault();

        var data = {
            id:  $('#modal_edit_url #id_url').val(),
            id_influencer: $('#id_influencer').val(),
            description: $('#modal_edit_url #description').val(),
        };

        $.ajax({
            url: "/campanha/url/update",
            method: "put",
            data: data,
            success: function(result){

                $(".alert").addClass('hide');

                if(result == 'update-true'){
                    Custombox.close();
                    $("#register-url .alert-success").removeClass('hide')
                    $("#register-url .alert-success span").html('<b>Success!</b> A descrição da URL foi editada.')
                    $('#tr_' + data.id).find('.text-description-url').html(data.description);
                    $('#tr_' + data.id).css({"border-left": "3px solid rgba(95, 190, 170, 0.4)"});
                }else if(result == 'name-existing'){
                    $("#modal_edit_url .alert-warning").removeClass('hide')
                    $("#modal_edit_url .alert-warning span").html('<b>Atenção!</b> Não foi possível alterar a descrição da URL, pois já existe outra URL com o mesmo nome.')
                    $('#tr_' + data.id).css({"border-left": "3px solid #ebcccc"});
                }else{
                    Custombox.close();
                    $("#register-url .alert-danger").removeClass('hide')
                    $("#register-url .alert-danger span").html('<b>Erro!</b> Ocorreu um erro crítico ao tentar editar a URL, por favor tente novamente ou entre em contato.')
                    $('#tr_' + data.id).css({"border-left": "3px solid #ebcccc"});
                }

                $(".alert-php").addClass('hide');

                setTimeout(function () {
                    $('#tr_' + data.id).css({"border-left": "0"});
                }, 4000);
            }
        });
     });

     //Delete URL
     $(".delete_url").click(function(event){

        event.preventDefault();

        if(!confirm('Realmente deseja excluir esta URL?')){
            return false;
        }

        var data = {id: $(this).attr('data-id-delete')};
        var _this = $(this);

        $.ajax({
            url: "/campanha/url/delete",
            method: "delete",
            data: data,
            success: function (result) {

                $(".alert").addClass('hide');

                if(result == 'delete-true'){

                    $("#register-url .alert-success").removeClass('hide');
                    $("#register-url .alert-success span").html('<b>Sucesso!</b> A URL foi removida.');

                    _this.parents(".gradeU").fadeOut("slow");

                }else{
                    $("#register-url .alert-danger").removeClass('hide')
                    $("#register-url .alert-danger span").html('<b>Erro!</b> Ocorreu um erro crítico ao tentar remover a campanha, por favor tente novamente ou entre em contato.')
                }

                $(".alert-php").addClass('hide');
            }
        });
     });


     /* ****************************************
     PIXEL CONVERSION
     **************************************** */
     //Edit Pixel Conversion
     $(".edit_pixel_conversion").click(function(event){

        event.preventDefault();

        var data = {id: $(this).attr('data-id-edit')};
        var _this = $(this);

        $.ajax({
            url: "pixel-conversao/edit",
            method: "post",
            data: data,
            success: function(result){

                if(result != 'null'){

                    var result = JSON.parse(result);

                    var interval = result.time_interval + '|' + result.interval_type;

                    $('#modal_edit_pixel #id_pixel_conversion').val(result.id);
                    $('#modal_edit_pixel #name').val(result.name);
                    $('#modal_edit_pixel #interval').find('.op_interval').each(function(){
                        var that_ = $(this);
                        var value = that_.val();
                        if(value == interval){
                            that_.attr('selected', true);
                        }
                    });
                    
                }else{
                    Custombox.close();
                    $("#crud-pixel-conversion .alert-danger").removeClass('hide')
                    $("#crud-pixel-conversion .alert-danger span").html('<b>Erro!</b> Ocorreu um erro ao tentar trazer as informações da campanha, por favor tente novamente ou entre em contato.')
                }
            }
        });
     });

     //Update Pixel Conversion
     $('#update_px_conversion').click(function(event){

        event.preventDefault();

        var data = {
            id: $('#modal_edit_pixel #id_pixel_conversion').val(),
            name: $('#modal_edit_pixel #name').val(),
            interval: $('#modal_edit_pixel #interval').val()
        };

        var textInterval = $('#modal_edit_pixel #interval :selected').text();
 
        $.ajax({
            url: "pixel-conversao/update",
            method: "put",
            data: data,
            success: function(result){

                $(".alert").addClass('hide');

                if(result == 'true'){
                    Custombox.close();
                    $("#crud-pixel-conversion .alert-success").removeClass('hide')
                    $("#crud-pixel-conversion .alert-success span").html('<b>Success!</b> O pixel conversão foi editado.')
                    $('#tr_' + data.id).find('.text-name-pixel').html(data.name);
                    $('#tr_' + data.id).find('.text-interval-pixel').html(textInterval);
                    $('#tr_' + data.id).css({"border-left": "3px solid rgba(95, 190, 170, 0.4)"});
                }else if(result == 'false'){
                    Custombox.close();
                    $("#crud-pixel-conversion .alert-danger").removeClass('hide')
                    $("#crud-pixel-conversion .alert-danger span").html('<b>Erro!</b> Ocorreu um erro ao tentar editar o pixel conversão, por favor tente novamente ou entre em contato.')
                    $('#tr_' + data.id).css({"border-left": "3px solid #ebcccc"});
                }else{
                    Custombox.close();
                    $("#crud-pixel-conversion .alert-danger").removeClass('hide')
                    $("#crud-pixel-conversion .alert-danger span").html('<b>Erro!</b> Ocorreu um erro crítico ao tentar editar o pixel conversão, por favor tente novamente ou entre em contato.')
                    $('#tr_' + data.id).css({"border-left": "3px solid #ebcccc"});
                }

                $(".alert-php").addClass('hide');

                setTimeout(function () {
                    $('#tr_' + data.id).css({"border-left": "0"});
                }, 4000);
            }
        });
     });

     //Code pixel conversion
     $('.code_tags_js').click(function(){
        var idPixelConversion = $(this).attr('data-id-code');
        var idUser = $(this).attr('data-id-user');

       var scriptPixelConversion ="<script type=\"text/javascript\">var u="+idUser+",px="+idPixelConversion+"; var imported = document.createElement('script'); imported.src = 'http://tracking.dev/js/user_access_information.js'; document.head.appendChild(imported); </script>";

       $('#code_tags_js_px').val(scriptPixelConversion);
     });


     //Delete pixel conversion
     $('.delete_pixel').click(function(){
        
        event.preventDefault();

        if(!confirm('Realmente deseja excluir este pixel?')){
            return false;
        }

        var data = {id: $(this).attr('data-id-delete')}
        var _this = $(this);

        $.ajax({
            url: "pixel-conversao/delete",
            method: "delete",
            data: data,
            success: function (result) {

                $(".alert").addClass('hide');

                if(result == 'true'){

                    $("#crud-pixel-conversion .alert-success").removeClass('hide');
                    $("#crud-pixel-conversion .alert-success span").html('<b>Sucesso!</b> O pixel foi removido.');

                    _this.parents(".gradeU").fadeOut("slow"); //Temporário - Refazer, pois o datatable já exclui a row

                }else{
                    $("#crud-pixel-conversion .alert-danger").removeClass('hide')
                    $("#crud-pixel-conversion .alert-danger span").html('<b>Erro!</b> Ocorreu um erro crítico ao tentar remover o pixel, por favor tente novamente ou entre em contato.')
                }

                $(".alert-php").addClass('hide');
             }
        });
     });

});