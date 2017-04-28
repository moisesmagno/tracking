$( document ).ready(function() {
    $("#btn_copy_token").click(function(){

        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($('#token').val());
        $('#token').select();
        document.execCommand("copy");
        $temp.remove();
    });
});