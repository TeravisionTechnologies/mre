/**
 * Created by Alfredo Rodriguez on 16/10/2017.
 */
function ajax_blog_cats(cat, container, loader, filter, order){
    $.ajax({
        url: ajaxblog.ajaxurl,
        type: 'post',
        data: {
            action: 'ajax_blog_cat',
            category: cat,
            filter: filter,
            order: order
        },
        beforeSend: function () {
            loader.show();
            container.hide();
        },
        success: function( result ) {
            container.html(result);
            loader.hide();
            var pages = Math.ceil(container.children().length/4);
            container.show();
            $('#blog-pagination').pagination({
                items: pages,
                currentPage: 1,
                cssStyle: 'compact-theme',
                prevText: '<span aria-hidden="true">&laquo;</span>',
                nextText: '<span aria-hidden="true">&raquo;</span>',
                onInit: function () {
                    var container = $(".blog-post-container");
                    var all_childrens = container.children();
                    container.html("");
                    for(var i = 0; i < all_childrens.length; i++){
                        container.append(all_childrens[i]);
                    }
                    var new_container = container.children();
                    for(var j = 0; j < new_container.length; j++){
                        if(j >= 4 ){
                            $(new_container[j]).addClass("hidden");
                        }
                    }
                },
                onPageClick: function (page, evt) {
                    var container = $(".blog-post-container");
                    var new_container = container.children();
                    var starts = (page-1)*4;
                    var allow = false;
                    for(var j = 0; j < new_container.length; j++){
                        if((starts+4) == j){
                            allow = false;
                        }
                        if(starts == j){
                            allow = true;
                        }
                        if(allow == true) {
                            $(new_container[j]).removeClass("hidden");
                        }else {
                            if(!$(new_container[j]).hasClass("hidden")){
                                $(new_container[j]).addClass("hidden");
                            }
                        }
                    }
                }
            });
        }
    })
}