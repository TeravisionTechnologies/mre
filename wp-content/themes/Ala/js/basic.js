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

    $(".flags-indicators img").click(function (e) {
        $(".flag-image-opacity").removeClass("flag-image-opacity");
        $(this).addClass("flag-image-opacity");
    });

    // Projects change effect
    $('.item-active').next().css('opacity', 1);
    $('.al-project-list-item').click(function () {
        $('.al-project-list-item').find('h2').removeClass('item-active');
        $(this).find('h2').addClass('item-active');
        $('.triangle').css('opacity', 0);
        $(this).find('img').css('opacity', 1);
    });

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

    // init Isotope
    var $grid = $('.properties-list').isotope({
        itemSelector: '.country-status',
        //layoutMode: 'fitRows',
        getSortData: {
            name: '.property-title',
            date: function ($elem) {
                return Date.parse($($elem).find('.date').text());
            }
        }
    });

    var filters = {};

    $('.filters').on('click', '.button', function () {
        var $this = $(this);
        var $buttonGroup = $this.parents('.button-group');
        var filterGroup = $buttonGroup.attr('data-filter-group');
        filters[filterGroup] = $this.attr('data-filter');
        var filterValue = concatValues(filters);
        $grid.isotope({filter: filterValue});
    });

    // change is-checked class on buttons
    $('.button-group').each(function (i, buttonGroup) {
        var $buttonGroup = $(buttonGroup);
        $buttonGroup.on('click', '.the-status', function () {
            $buttonGroup.find('.is-checked').removeClass('item-active');
            $(this).addClass('item-active');
        });
        $buttonGroup.on('click', '.the-country', function () {
            $buttonGroup.find('.is-checked').removeClass('item-active2');
            $(this).addClass('item-active2');
        });
    });

    // flatten object by concatting values
    function concatValues(obj) {
        var value = '';
        for (var prop in obj) {
            value += obj[prop];
        }
        return value;
    }

    // Sort function
    $('.sort-by-button-group').on('click', '.orderby', function () {

        /* Get the element name to sort */
        var sortValue = $(this).attr('data-sort-value');

        /* Get the sorting direction: asc||desc */
        var direction = $(this).attr('data-sort-direction');

        /* convert it to a boolean */
        var isAscending = (direction == 'asc');
        var newDirection = (isAscending) ? 'desc' : 'asc';

        console.log(sortValue);
        console.log(direction);

        /* pass it to isotope */
        $grid.isotope({sortBy: sortValue, sortAscending: isAscending});

        $(this).attr('data-sort-direction', newDirection);

        var span = $(this).find('.fa');
        span.toggleClass('fa-chevron-up fa-chevron-down');

    });

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

});


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

var close = document.querySelector('#menu-item-15');

close.addEventListener('click', function (e) {
    e.preventDefault;
    slideLeft.close();
});

var closecnt = document.querySelector('#menu-item-19');

closecnt.addEventListener('click', function (e) {
    e.preventDefault;
    slideLeft.close();
});

