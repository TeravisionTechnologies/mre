/**
 * Created by Alfredo Rodriguez on 16/10/2017.
 */
function ajax_blog_cats(cat, container){
    $.ajax({
        url: ajaxblog.ajaxurl,
        type: 'post',
        data: {
            action: 'ajax_blog_cat',
            category: cat
        },
        success: function( result ) {
            container.html(result);            
            
            console.log( result );
        }
    })
}
