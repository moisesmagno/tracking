$( document ).ready(function() {

    /* ****************************************
     MARK
     **************************************** */
    //Edit campaign
    $(".edit_mark").click(function(event){

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
                    $('#modal_edit_mark #id_mark').val(result.id);
                    $('#modal_edit_mark #name_mark').val(result.name);

                }else{
                    $("#register .alert-danger").removeClass('hide')
                    $("#register .alert-danger span").html('<b>Erro!</b> Ocorreu um erro ao tentar trazer as informações da marca, por favor tente novamente ou entre em contato.')
                }
            }
        });
    });

    //Update campaign
    $('#form_update_mark').click(function(){
        var data = {
            id: $('#id_mark').val(),
            name: $('#name_mark').val()
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
                    $("#register .alert-success span").html('<b>Success!</b> O nome da marca foi editada.')
                    $('#tr_' + data.id).find('.text-name-mark').html(data.name);
                    $('#tr_' + data.id).css({"border-left": "3px solid rgba(95, 190, 170, 0.4)"});
                }else if(result == 'name-existing'){
                    $("#modal_edit_mark .alert-warning").removeClass('hide')
                    $("#modal_edit_mark .alert-warning span").html('<b>Atenção!</b> Não foi possível alterar o nome da marca, pois já existe outra marca com o mesmo nome.')
                }else{
                    Custombox.close();
                    $("#register .alert-danger").removeClass('hide')
                    $("#register .alert-danger span").html('<b>Erro!</b> Ocorreu um erro crítico ao tentar editar a marca, por favor tente novamente ou entre em contato.')
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
    $(".delete_mark").click(function(event){

        event.preventDefault();

        if(!confirm('Realmente deseja excluir esta marca?')){
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
                    $("#register .alert-success span").html('<b>Sucesso!</b> A marca foi removida.');

                    _this.parents(".gradeU").fadeOut("slow"); //Temporário - Refazer, pois o datatable já exclui a row

                }else{
                    $("#register .alert-danger").removeClass('hide')
                    $("#register .alert-danger span").html('<b>Erro!</b> Ocorreu um erro ao tentar remover a marca, por favor tente novamente ou entre em contato.')
                }

                $(".alert-php").addClass('hide');
            }
        });
    });

    /* ****************************************
     CAMPAIGN
    **************************************** */
    //Edit campaign
    $(".edit_campaign").click(function(event){

        event.preventDefault();

        var data = {id: $(this).attr('data-id-edit')};
        var _this = $(this);

        $.ajax({
            url: "/marca/campaign/edit",
            method: "post",
            data: data,
            success: function(result){

                if(result != 'null'){

                     var result = JSON.parse(result);
                    $('#modal_edit_campaign #id_campaign').val(result.id);
                    $('#modal_edit_campaign #name_campaign').val(result.name);

                    $('#modal_edit_campaign #pixel').find('.op-pixel').each(function(){
                        var that_ = $(this);
                        var value = that_.val();

                        var valuePixel = (result.get_pixels[0] === undefined ? '' : result.get_pixels[0].id);

                        if(value == valuePixel){
                            that_.attr('selected', true);
                        }
                    });

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
            id: $('#modal_edit_campaign #id_campaign').val(),
            name: $('#modal_edit_campaign #name_campaign').val(),
            id_pixel: $('#modal_edit_campaign #pixel').val(),
            name_pixel: $('#modal_edit_campaign #pixel :selected').text(),
            id_mark: $('#modal_edit_campaign #id_mark').val(),
        };

        $.ajax({
            url: "/marca/campaign/update",
            method: "put",
            data: data,
            success: function(result){

                $(".alert").addClass('hide');

                if(result == 'register-ok'){
                    Custombox.close();
                    $("#register .alert-success").removeClass('hide')
                    $("#register .alert-success span").html('<b>Success!</b> O nome da campanha foi editada.')
                    $('#tr_' + data.id).find('.text-name-campaign').html(data.name);
                    $('#tr_' + data.id).find('.text-name-pixel').html((data.id_pixel != '') ? data.name_pixel : '--');
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
            url: "/marca/campaign/delete",
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
            url: "/marca/campaign/influencer/edit",
            method: "post",
            data: data,
            success: function(result){

                if(result != 'null'){

                    var result = JSON.parse(result);

                    $('#modal_edit_influencer #id_influencer').val(result.id);
                    $('#modal_edit_influencer #name').val(result.name);
                    $('#modal_edit_influencer #destiny_url').val(result.destiny_url);
                    $('#modal_edit_influencer #short_url').val(result.short_url);

                }else{
                    Custombox.close();
                    $("#register-url .alert-danger").removeClass('hide')
                    $("#register-url .alert-danger span").html('<b>Erro!</b> Ocorreu um erro ao tentar trazer as informações da campanha, por favor tente novamente ou entre em contato.')
                }
            }
        });
    });

    //Update influencer
    $('#form_update_influencer').click(function(event){

        event.preventDefault();

        var data = {
            id:  $('#modal_edit_influencer #id_influencer').val(),
            id_campaign: $('#modal_edit_influencer #id_campaign').val(),
            name: $('#modal_edit_influencer #name').val(),
        };

        $.ajax({
            url: "/marca/campaign/influencer/update",
            method: "put",
            data: data,
            success: function(result){

                $(".alert").addClass('hide');

                if(result == 'update-true'){
                    Custombox.close();
                    $("#register-influencer .alert-success").removeClass('hide')
                    $("#register-influencer .alert-success span").html('<b>Success!</b> O nome do influenciador foi alterado.')
                    $('#tr_' + data.id).find('.text-description-name').html(data.name);
                    $('#tr_' + data.id).css({"border-left": "3px solid rgba(95, 190, 170, 0.4)"});
                }else if(result == 'name-existing'){
                    $("#modal_edit_influencer .alert-warning").removeClass('hide')
                    $("#modal_edit_influencer .alert-warning span").html('<b>Atenção!</b> Não foi possível alterar o nome do influenciador, pois já existe outro influenciador com o mesmo nome.')
                    $('#tr_' + data.id).css({"border-left": "3px solid #ebcccc"});
                }else{
                    Custombox.close();
                    $("#register-influencer .alert-danger").removeClass('hide')
                    $("#register-influencer .alert-danger span").html('<b>Erro!</b> Ocorreu um erro crítico ao tentar editar o nome do influenciador, por favor tente novamente ou entre em contato.')
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

        if(!confirm('Realmente deseja excluir este Influenciador?')){
            return false;
        }

        var data = {id: $(this).attr('data-id-delete')};
        var _this = $(this);

        $.ajax({
            url: "/marca/campaign/influencer/delete",
            method: "delete",
            data: data,
            success: function (result) {

                $(".alert").addClass('hide');

                if(result == 'delete-true'){

                    $("#register-influencer .alert-success").removeClass('hide');
                    $("#register-influencer .alert-success span").html('<b>Sucesso!</b> O Influeciador foi removida.');

                    _this.parents(".gradeU").fadeOut("slow");

                }else{
                    $("#register-influencer .alert-danger").removeClass('hide')
                    $("#register-influencer .alert-danger span").html('<b>Erro!</b> Ocorreu um erro crítico ao tentar remover o influeciador, por favor tente novamente ou entre em contato.')
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
        var total_conversion = $(this).attr('data-total-conversions');
        var _this = $(this);

        $.ajax({
            url: "/pixel-conversao/edit",
            method: "post",
            data: data,
            success: function(result){

                if(result != 'null'){

                    var result = JSON.parse(result);

                    var interval = result.time_interval + '|' + result.interval_type;

                    $('#modal_edit_pixel #id_pixel_conversion').val(result.id);
                    $('#modal_edit_pixel #name').val(result.name);
                    $('#modal_edit_pixel #value').val(formatReal(result.value));
                    $('#modal_edit_pixel #total_conversions').val(total_conversion);
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
            value: $('#modal_edit_pixel #value').val(),
            interval: $('#modal_edit_pixel #interval').val(),
            total_conversion: $('#modal_edit_pixel #total_conversions').val()
        };

        var textInterval = $('#modal_edit_pixel #interval :selected').text();

        // var valorTotal = parseFloat(data.value) * parseInt(data.total_conversion);
        var value1 = data.value.replace(".", "");
        var valueDecimal = value1.replace(",", ".");

        var num = new NumberFormat();
        num.setInputDecimal('.');
        num.setNumber(valueDecimal); // obj.value é '-1000.24'
        num.setPlaces('2', false);
        num.setCurrencyValue('');
        num.setCurrency(true);
        num.setCurrencyPosition(num.LEFT_OUTSIDE);
        num.setNegativeFormat(num.LEFT_DASH);
        num.setNegativeRed(false);
        num.setSeparators(true, '.', ',');
        var valorTotal = num.toFormatted(); //obj.value é '-1.000,24'


        $.ajax({
            url: "/pixel-conversao/update",
            method: "put",
            data: data,
            success: function(result){

                $(".alert").addClass('hide');

                if(result == 'true'){
                    Custombox.close();
                    $("#crud-pixel-conversion .alert-success").removeClass('hide')
                    $("#crud-pixel-conversion .alert-success span").html('<b>Success!</b> O pixel conversão foi editado.')
                    $('#tr_' + data.id).find('.text-name-pixel').html(data.name);

                    $('#tr_' + data.id).find('.text-name-value').html('R$ ' + data.value);
                    $('#tr_' + data.id).find('.text-name-total-value').html('R$ ' + valorTotal);

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

       var scriptPixelConversion ="<script type=\"text/javascript\">var u="+idUser+",px="+idPixelConversion+"; var imported = document.createElement('script'); imported.src = '" + localStorage.getItem("path_url") + "js/user_access_information.js'; document.head.appendChild(imported); </script>";

       $('#code_tags_js_px').val(scriptPixelConversion);
     });


     //Delete pixel conversion
     $('.delete_pixel').click(function(event){

        event.preventDefault();

        if(!confirm('Realmente deseja excluir este pixel?')){
            return false;
        }

        var data = {
            id: $(this).attr('data-id-delete'),
        }

        var _this = $(this);

        $.ajax({
            url: "/pixel-conversao/delete",
            method: "delete",
            data: data,
            success: function (result) {

                $(".alert").addClass('hide');

                if(result == 'true'){

                    $("#crud-pixel-conversion .alert-success").removeClass('hide');
                    $("#crud-pixel-conversion .alert-success span").html('<b>Sucesso!</b> O pixel foi removido.');

                    _this.parents(".gradeU").fadeOut("slow");

                }else{
                    $("#crud-pixel-conversion .alert-danger").removeClass('hide')
                    $("#crud-pixel-conversion .alert-danger span").html('<b>Erro!</b> Ocorreu um erro crítico ao tentar remover o pixel, por favor tente novamente ou entre em contato.')
                }

                $(".alert-php").addClass('hide');
             }
        });
     });

});