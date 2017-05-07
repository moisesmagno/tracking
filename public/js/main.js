$( document ).ready(function() {
    
    //Copy token
    $('#btn_copy_token').click(function(){

        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($('#token').val());
        $('#token').select();
        document.execCommand("copy");
        $temp.remove();
    });

    //Copy Script Js
    $('#btn_script_js').click(function(){
        var $temp = $("<textarea>");
        $("body").append($temp);
        $temp.val($('#code_pixel_conversion textarea').val());
        $('#code_pixel_conversion textarea').select();
        document.execCommand("copy");
        $temp.remove();
    });
});
