jQuery(document).ready(function () {

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

    // Go to top
    $(".footer-top").click(function () {
        $("html, body").animate({scrollTop: 0}, 2000);
    });

    // Add Swiper Flags
    var swiperFlag = new Swiper('.swiper-container-flags', {
        initialSlide: 0,
        nested: true
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

    // Projects change effect
    $('.item-active').next().css('opacity', 1);

    // Menu flags functionality
    $('.al-menu-language-flag').click(function () {
        $('.al-menu-language-flag').css('opacity', 0.4);
        $(this).css('opacity', 1);
    });

    $("#menu-contact").click(function () {
        $('html, body').animate({
            scrollTop: $("#contact-us").offset().top
        }, 2000);
    });

    //Slider Amenities
    var slideComodidades;
    $('.gallery-comodidades').click(function () {
        slideComodidades = $(this).attr('data-number');
        $("#myModal").on('show.bs.modal', function () {
            setTimeout(function () {
                var galleryTop = new Swiper('.gallery-top', {
                    nextButton: '.swiper-button-next',
                    prevButton: '.swiper-button-prev',
                    spaceBetween: 10,
                    loop: true,
                    loopedSlides: 5, //looped slides should be the same
                });
                var galleryThumbs = new Swiper('.gallery-thumbs', {
                    spaceBetween: 10,
                    slidesPerView: 4,
                    touchRatio: 0.2,
                    loop: true,
                    loopedSlides: 5, //looped slides should be the same
                    slideToClickedSlide: true
                });
                galleryTop.params.control = galleryThumbs;
                galleryThumbs.params.control = galleryTop;
                galleryThumbs.slideTo(slideComodidades, 0);
            }, 500);
        });
    });

    var slideDetalles;
    $('.gallery-detalles').click(function () {
        slideDetalles = $(this).attr('data-number');
        $("#myModalDetails").on('show.bs.modal', function () {
            setTimeout(function () {
                var galleryTop = new Swiper('.gallery-top-details', {
                    nextButton: '.swiper-button-next',
                    prevButton: '.swiper-button-prev',
                    spaceBetween: 10,
                    loop: true,
                    loopedSlides: 5, //looped slides should be the same
                });
                var galleryThumbs = new Swiper('.gallery-thumbs-details', {
                    spaceBetween: 10,
                    slidesPerView: 4,
                    touchRatio: 0.2,
                    loop: true,
                    loopedSlides: 5, //looped slides should be the same
                    slideToClickedSlide: true
                });
                galleryTop.params.control = galleryThumbs;
                galleryThumbs.params.control = galleryTop;
                galleryThumbs.slideTo(slideDetalles, 0);
            }, 500);
        });
    });

    var slideNearby;
    $('.places-wrapper').click(function () {
        slideNearby = $(this).attr('data-number');
        $("#myModalNearby").on('show.bs.modal', function () {
            setTimeout(function () {
                var galleryTop = new Swiper('.gallery-top-nearby', {
                    nextButton: '.swiper-button-next',
                    prevButton: '.swiper-button-prev',
                    spaceBetween: 10,
                    loop: true,
                    loopedSlides: 5, //looped slides should be the same
                });
                var galleryThumbs = new Swiper('.gallery-thumbs-nearby', {
                    spaceBetween: 10,
                    slidesPerView: 4,
                    touchRatio: 0.2,
                    loop: true,
                    loopedSlides: 5, //looped slides should be the same
                    slideToClickedSlide: true
                });
                galleryTop.params.control = galleryThumbs;
                galleryThumbs.params.control = galleryTop;
                galleryThumbs.slideTo(slideNearby, 0);
            }, 500);
        });
    });

    var galleryTop = new Swiper('.gallery-top-blueprint', {
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        spaceBetween: 10,
        loop: true,
        loopedSlides: 5, //looped slides should be the same
        initialSlide: 1
    });
    var galleryThumbs = new Swiper('.gallery-thumbs-blueprint', {
        spaceBetween: 98,
        slidesPerView: 3,
        touchRatio: 0.2,
        loop: true,
        loopedSlides: 5, //looped slides should be the same
        slideToClickedSlide: true,
        initialSlide: 1,
        centeredSlides: true,
        breakpoints: {
            // when window width is <= 767px
            767: {
                slidesPerView: 2,
                spaceBetween: 14
            }
        }
    });
    galleryTop.params.control = galleryThumbs;
    galleryThumbs.params.control = galleryTop;


    $(function () {
        $('.locations').on('click', '.the-country', function (e) {
            e.preventDefault();
            $(this).parents('.locations').find('.active').removeClass('active').end().end().addClass('active');
        });
    });

    $('.play-video').click(function () {
        var ff = $(this).attr("data-id");
        document.getElementById(ff).paused ? document.getElementById(ff).play() : document.getElementById(ff).pause();
    });

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

    $("#menu-item-15").click(function (e) {
        e.preventDefault;
        slideLeft.close();
        var position = $("#al-projects").offset().top;
        var finalPosition = position - 80;
        $('html, body').animate({
            scrollTop: finalPosition
        }, 2000);
    });

    $("#menu-item-165").click(function (e) {
        e.preventDefault;
        slideLeft.close();
        var position = $("#al-projects").offset().top;
        var finalPosition = position - 80;
        $('html, body').animate({
            scrollTop: finalPosition
        }, 2000);
    });

    $("#menu-item-19").click(function (e) {
        e.preventDefault;
        slideLeft.close();
        var position = $("#contact-us").offset().top;
        var finalPosition = position - 80;
        $('html, body').animate({
            scrollTop: finalPosition
        }, 2000);
    });

    $("#menu-item-183").click(function (e) {
        e.preventDefault;
        slideLeft.close();
        var position = $("#contact-us").offset().top;
        var finalPosition = position - 80;
        $('html, body').animate({
            scrollTop: finalPosition
        }, 2000);
    });

    if (window.location.href.indexOf("page") > -1 || window.location.href.indexOf("section") > -1) {
        $('html, body').animate({
            scrollTop: $("#ala-properties").offset().top
        }, 500);
    }

    if(document.referrer.indexOf("/page") > 0){
        $('html, body').animate({
            scrollTop: $("#ala-properties").offset().top
        }, 500);
    }

    $(document).on('click', '.al-project-list-item', function (e) {
        $('.al-project-list-item').find('h2').removeClass('item-active');
        $(this).find('h2').addClass('item-active');
        $('.triangle').css('opacity', 0);
        $(this).find('img').css('opacity', 1);
        var selstatus = $(this).attr('data-value');
        $("#project-status").val(selstatus);
        $("#section").val(0);
        $(this).closest('form').submit();
    });
    $(document).on('click', '.the-country', function (e) {
        var selocation = $(this).attr('data-value');
        $("#project-location").val(selocation);
        $("#section").val(0);
        $(this).closest('form').submit();
    });
    $(document).on('click', '.orderby', function (e) {
        var orderBy = $(this).attr('data-value');
        $("#orderBy").val(orderBy);
        $("#orderByName").val($(this).val());
        $(this).closest('form').submit();
    });

    
    var href_split = window.location.href.split('?');

    if ( href_split[0] ){

        $("#sl-lgg").val( href_split[0] );
    }else{
        $("#sl-lgg").val( window.location.href );
    }
});

$(document).scroll(function() {
    var y = $(this).scrollTop();
    if (y > 800) {
        $('.footer-top').fadeIn();
    } else {
        $('.footer-top').fadeOut();
    }
});

$(document).on('change', '#sl-lgg', function (e) {
       
    window.location.href = $('#sl-lgg').val();

});

