jQuery(document).ready(function () {

    $(".loading-posts").hide();

    // Blog Pagination
    /*var pages = Math.ceil($(".blog-post-container").children().length / 4);
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
            for (var i = 0; i < all_childrens.length; i++) {
                container.append(all_childrens[i]);
            }
            var new_container = container.children();
            for (var j = 0; j < new_container.length; j++) {
                if (j >= 4) {
                    $(new_container[j]).addClass("hidden");
                }
            }
        },
        onPageClick: function (page, evt) {
            var container = $(".blog-post-container");
            var new_container = container.children();
            var starts = (page - 1) * 4;
            var allow = false;
            for (var j = 0; j < new_container.length; j++) {
                if ((starts + 4) == j) {
                    allow = false;
                }
                if (starts == j) {
                    allow = true;
                }
                if (allow == true) {
                    $(new_container[j]).removeClass("hidden");
                } else {
                    if (!$(new_container[j]).hasClass("hidden")) {
                        $(new_container[j]).addClass("hidden");
                    }
                }
            }
        }
    });*/

    // Hero Swiper
    var swiperHero = new Swiper('.swiper-container-hero', {
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        slidesPerView: 1,
        loop: true,
        nested: true,
        autoplay: 5000,
        effect: 'fade'
    });

    // Menu flags functionality
    $('.mre-menu-language-flag').click(function () {
        $('.mre-menu-language-flag').css('opacity', 0.4);
        $(this).css('opacity', 1);
    });

    // Add Swiper Flags
    var swiperFlag = new Swiper('.swiper-container-flags', {
        //initialSlide: 1,
        nested: true,
    });

    // Adding Swiper functionality to flags
    $('.flag-image').on('click', function () {
        var index = $(this).data('pagination');
        swiperFlag.slideTo(index - 1);
    });

    $(".flag-image").click(function (e) {
        $(".flag-image-opacity").removeClass("flag-image-opacity");
        $(this).addClass("flag-image-opacity");
    });

    // Swiper Blog Categories
    var swiper_blog_categories = new Swiper('.swiper-container-blog-categories', {
        slidesPerView: 5,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        centeredSlides: true,
        loop: true,
        runCallbacksOnInit: false,
        observer: true,
        breakpoints: {
            767: {
                slidesPerView: 1,
                spaceBetween: 5
            },
        },
        onSlideChangeEnd: function (swiper) {

            $('.blog-list-category-text').html($('.swiper-container-blog-categories').find('.swiper-slide-active').attr('name'));
            $('.swiper-slide').find('div').addClass('swiper-overlay');
            $('.swiper-slide-active').find('.swiper-overlay').removeClass('swiper-overlay');
            var active_slide_cat = $('.swiper-container-blog-categories').find('.swiper-slide-active').attr('data-slug');
            var container = $(".blog-post-container");
            var loader = $(".loading-posts");
            var paged = $("#paged").val();
            var filter = $("#orderby").find(":selected").val();
            var order = $("#order").val();
            ajax_blog_cats(active_slide_cat, container, loader, paged, filter, order);
        },
        onClick: function (sw, e) {

        }
    });
    $('.blog-list-category-text').html($('.swiper-container-blog-categories').find('.swiper-slide-active').attr('name'));
    $('.swiper-slide-active').find('.swiper-overlay').removeClass('swiper-overlay');
    $('.swiper-button-next, .swiper-button-prev').click(function () {
    });

    /*window.addEventListener("resize", function () {
        setTimeout(function () {
            swiper_blog_categories.update();
        }, 500);
    }, false);*/

    // Swiper Blog Post Most Viewed
    var swiper_blog_most_viewed = new Swiper('.swiper-container-blog-most-viewed', {
        slidesPerView: 3,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        spaceBetween: 35,
        centeredSlides: false,
        breakpoints: {
            1023: {
                slidesPerView: 2,
                spaceBetween: 29,
            },
            640: {
                slidesPerView: 1,
                spaceBetween: 0,
            }
        }
    });

    // Footer Go to top functionality
    $(".mre-footer-go-top").click(function () {
        $("html, body").animate({scrollTop: 0}, 2000);
    });

    // Menu links scroll down
    $("#menu-about").click(function () {
        $('html, body').animate({
            scrollTop: $("#mre-about-us").offset().top
        }, 2000);
    });

    $("#menu-contact").click(function () {
        $('html, body').animate({
            scrollTop: $("#contact-us").offset().top
        }, 2000);
    });

    //Hero Button functionality
    $(".hero-button").click(function () {
        var position = $("#mre-about-us").offset().top;
        var finalPosition = position - 80;
        $('html, body').animate({
            scrollTop: finalPosition
        }, 2000);
    });

    $("#order_select").on("change", function () {
        $("#filter").val($(this).val());
        $("#form-filter").submit();
    });

    $("#orderby").on("change", function () {
        this.form.submit();
    });

    var height = $("#navbar").height();
    var height = height + 26;

    window.addEventListener("hashchange", function () {
        window.scrollTo(window.scrollX, window.scrollY - height);
    });

    if (window.location.hash) {
        window.scrollTo(window.scrollX, window.scrollY - height);
    }

    // Menu landscape height
    var height = $(window).height();
    var navheight = $('.menu-button').outerHeight();
    $('.menu-wrapper').height(height - navheight);

    window.addEventListener("resize", function () {
        setTimeout(function () {
            var height = $(window).height();
            var navheight = $('.menu-button').outerHeight();
            $('.menu-wrapper').height(height - navheight);
        }, 500);
    }, false);

    var slideLeft = new Menu({
        wrapper: '#o-wrapper',
        type: 'slide-left',
        menuOpenerClass: '.c-button',
        maskId: '#c-mask'
    });

    var slideLeftBtn = document.querySelector('#c-button--slide-left');
    slideLeftBtn.addEventListener('click', function (e) {
        e.preventDefault;
        slideLeft.open();
    });

    $("#menu-item-125").click(function (e) {
        e.preventDefault;
        slideLeft.close();
        var position = $("#mre-about-us").offset().top;
        var finalPosition = position - 80;
        $('html, body').animate({
            scrollTop: finalPosition
        }, 2000);
    });

    $("#menu-item-24").click(function (e) {
        e.preventDefault;
        slideLeft.close();
        var position = $("#contact-us").offset().top;
        var finalPosition = position - 80;
        $('html, body').animate({
            scrollTop: finalPosition
        }, 2000);
    });
    $("#menu-item-155").click(function (e) {
        e.preventDefault;
        slideLeft.close();
        var position = $("#contact-us").offset().top;
        var finalPosition = position - 80;
        $('html, body').animate({
            scrollTop: finalPosition
        }, 2000);
    });

    // Download ebook
    function downloadFile(filePath){
        var link = document.createElement('a');
        link.href = filePath;
        link.download = filePath.substr(filePath.lastIndexOf('/') + 1);
        link.click();
    }

    $('.ebook-form').validator().on('submit', function (e) {
        var filepath = $(this).attr('data-filepath');
        var errormsj = $('.error').attr('data-error');
        if (e.isDefaultPrevented()) {
            $('.error').html("<i class='fa fa-asterisk'></i>" + errormsj);
            $('.error').fadeIn();
            var error = $('#eb_mail').attr('data-error');
            if( $('#eb_name', this).val().length > 0 ) {
                $('.error').html(error);
            }
        } else {
            e.preventDefault();
            $('.error').fadeOut();
            $.ajax({
                type: 'post',
                url: 'http://test-mre.pantheonsite.io/ebook-submit/',
                data: $(this).serialize(),
                beforeSend:function(xhr){
                    $('.ebook-btn').attr({disabled: 'disabled'});
                    $('body').addClass('thanks');
                },
                success: function (data) {
                    $('.modal-ebook').modal('hide');
                    $('.thankyou').fadeIn();
                    setTimeout(function() {
                        $('.thankyou').fadeOut();
                        $('body').removeClass('thanks');
                    }, 3000);
                    $('.ebook-btn').removeAttr('disabled');
                    setTimeout(function() {
                        downloadFile(filepath);
                    }, 2000);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("Status: " + textStatus); alert("Error: " + errorThrown);
                }
            });
        }
    });

    $(document).on('click', '.orderby', function (e) {
        var orderBy = $(this).attr('data-value');
        $("#orderBy").val(orderBy);
        $("#orderByName").val($(this).val());
        $(this).closest('form').submit();
    });

});

$(document).scroll(function() {
    var y = $(this).scrollTop();
    if (y > 800) {
        $('.mre-footer-go-top').fadeIn();
    } else {
        $('.mre-footer-go-top').fadeOut();
    }
});






