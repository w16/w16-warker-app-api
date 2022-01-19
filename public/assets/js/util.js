(function($) {
    $("#latitude").mask("999.99999");
    $("#longitude").mask("999.99999");
    
    //Campo apenas numeros
    $(".onlynumbers").on("keyup", function(e) {
        e.preventDefault();
        var expre = /[^\d]/g;
        $(this).val($(this).val().replace(expre,''));
   	});
    //Campo apenas numeros
})(jQuery);