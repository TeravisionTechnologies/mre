(function($){

    function initial_call (){

        var lang = $('#post_lang_choice').val();
    
        if ( lang == 'en' ){

            $('.cmb2-id--br-pbtn-en-id').css("display", "block");
            $('.cmb2-id--br-pbtn-es-id').css("display", "none");

            $('.cmb2-id--br-mbtn-en-id').css("display", "block");
            $('.cmb2-id--br-mbtn-es-id').css("display", "none");

            $('.cmb2-id--br-brochure-en-id').css("display", "block");
            $('.cmb2-id--br-brochure-es-id').css("display", "none");
        
        }else if ( lang == 'es' ){

            $('.cmb2-id--br-pbtn-en-id').css("display", "none");
            $('.cmb2-id--br-pbtn-es-id').css("display", "block");

            $('.cmb2-id--br-mbtn-en-id').css("display", "none");
            $('.cmb2-id--br-mbtn-es-id').css("display", "block");

            $('.cmb2-id--br-brochure-en-id').css("display", "none");
            $('.cmb2-id--br-brochure-es-id').css("display", "block");
    
        }
        
    }
    

    $(document).ready(function () {

        initial_call();
        
    });

    $('#post_lang_choice').change(function(){

        initial_call();

    });


})(jQuery);


