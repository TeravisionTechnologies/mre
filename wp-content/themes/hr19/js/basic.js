jQuery(document).ready(function ($) {

    // Swiper Property
    var swiper = new Swiper('.swiper-property', {
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        pagination: '.fraction',
        paginationType: 'fraction'
    });

    // Sticky info property
    var navheight = $('.menu-button').outerHeight();
    $(".property-info-heading").sticky({topSpacing: navheight});

    // Footer Go to top functionality
    $(".footer-top").click(function () {
        $("html, body").animate({scrollTop: 0}, 2000);
    });

    //Menu functionality
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

    // Close menu on menu item clicked
    var close = document.querySelector('#menu-item-27');
    if (close != null) {
        close.addEventListener('click', function (e) {
            e.preventDefault;
            slideLeft.close();
        });
    }

    // Close menu on menu item clicked
    var close = document.querySelector('#menu-item-24');
    if (close != null) {
        close.addEventListener('click', function (e) {
            e.preventDefault;
            slideLeft.close();
        });
    }

    // Go to top functionality
    $(".footer-top").click(function () {
        $("html, body").animate({scrollTop: 0}, 2000);
    });

    //Menu flags
    $('.hr-menu-language-flag').click(function () {
        $('.hr-menu-language-flag').css('opacity', 0.4);
        $(this).css('opacity', 1);
    });

    //Menu contact us functionality
    $("#menu-item-17").click(function (e) {
        e.preventDefault;
        slideLeft.close();
        var position = $("#contact-us").offset().top;
        var finalPosition = position - 80;
        $('html, body').animate({
            scrollTop: finalPosition
        }, 2000);
    });

    //Menu rentalone us functionality
    $("#menu-item-51").click(function (e) {
        e.preventDefault;
        slideLeft.close();
        var position = $("#rentalone").offset().top;
        var finalPosition = position - 80;
        $('html, body').animate({
            scrollTop: finalPosition
        }, 2000);
    });

    //Agents profiles background color
    $(".agent-profile:even").css("background", "#d6d6d6");
    $(".agent-profile:odd").css("background", "#f0f0f0");

    //Agent properties show and hide
    $(".properties-number").click(function () {
        $(this).find("i").toggleClass("fa-caret-down").toggleClass("fa-caret-up");
        var t = $(this);
        $('#' + t.data('target')).slideToggle("slow");
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

    $('.panel-title a').click(function () {
        if ($(this).attr('aria-expanded') === "true") {
            $(this).next("i").removeClass("fa-minus");
            $(this).next("i").addClass("fa-plus");
        } else {
            $(this).next("i").removeClass("fa-plus");
            $(this).next("i").addClass("fa-minus");
        }
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    $('#collapse3').on('hidden.bs.collapse', function () {
        initMap();
    });
    $('#collapse3').on('shown.bs.collapse', function () {
        initMap();
    });

    $('#map-switch').click(function () {
        $("#search-map").slideToggle();
        $("html, body").animate({scrollTop: 0}, 500);
        $(".property-list").toggleClass('property-list-search');
    });

    //Search Google Maps
    var propertiesArray = [];
    $('.property').each(function () {
        var propertyData = {};
        propertyData.address = $(this).find('.property-address').html();
        propertyData.price = $(this).find('.property-price').html();
        propertyData.highlights = $(this).find('.property-highlights').html();
        propertyData.mls = $(this).find('.property-code').html();
        propertiesArray.push(propertyData);
    });

    //Search Google Maps

    var locations = [
        ['500', 'Caracas, Distrito Capital', 'Multifamiliar · 5 Habitaciones · 4 Baños', 'A1924266'],
        ['15000', 'Santo Domingo, República Dominicana', 'Multifamiliar · 5 Habitaciones · 4 Baños', 'A1924266'],
        ['2500000', 'Miami, Florida, EE. UU', 'Multifamiliar · 5 Habitaciones · 4 Baños', 'A1924266']
    ];

    var geocoder;
    var map;
    var bounds = new google.maps.LatLngBounds();

    function initialize() {
        map = new google.maps.Map(
            document.getElementById("search-map"), {
                center: new google.maps.LatLng(37.4419, -122.1419),
                zoom: 13,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
        geocoder = new google.maps.Geocoder();

        for (i = 0; i < locations.length; i++) {
            geocodeAddress(locations, i);
        }
    }

    google.maps.event.addDomListener(window, "load", initialize);

    function geocodeAddress(locations, i) {
        var priceUnformatted = locations[i][0];
        var price = '';
        if (priceUnformatted > 999 && priceUnformatted < 1000000) {
            price = '$' + (priceUnformatted / 1000) + 'K';
        }
        else if (priceUnformatted >= 1000000) {
            price = '$' + (priceUnformatted / 1000000) + 'm';
        }
        else {
            price = '$' + priceUnformatted;
        }
        var address = locations[i][1];
        var highlights = locations[i][2];
        var mls = locations[i][3];
        geocoder.geocode({
                'address': locations[i][1]
            },

            function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var marker = new google.maps.Marker({
                        icon: hr19.root + '/assets/pointgreen.svg',
                        map: map,
                        position: results[0].geometry.location,
                        animation: google.maps.Animation.DROP,
                        address: address,
                        price: price,
                        highlights: highlights,
                        mls: mls,
                        label: {text: price, color: 'white', fontFamily: 'Montserrat-Regular', fontSize: '12px'}
                    });
                    marker.addListener('mouseover', function () {
                        this.setLabel({
                            text: price,
                            color: 'black',
                            fontFamily: 'Montserrat-Regular',
                            fontSize: '12px'
                        });
                        this.setIcon(hr19.root + '/assets/pointwhite.svg');
                    });
                    marker.addListener('mouseout', function () {
                        this.setLabel({
                            text: price,
                            color: 'white',
                            fontFamily: 'Montserrat-Regular',
                            fontSize: '12px'
                        });
                        this.setIcon(hr19.root + '/assets/pointgreen.svg');
                    });

                    infoWindow(marker, map, price, address, highlights, mls);
                    bounds.extend(marker.getPosition());
                    map.fitBounds(bounds);
                } else {
                    alert("geocode of " + address + " failed:" + status);
                }
            });
    }

    function infoWindow(marker, map, price, address, highlights, mls) {
        google.maps.event.addListener(marker, 'click', function () {
            var html = "<a href=property/" + mls  +"><div class='info-container'>" +
                "<div class='info-image'></div>" +
                "<div class='info-data'>" +
                "<h2 class='info-data-price'>" + price + "</h2>" +
                "<h3 class='info-data-highlights'>" + highlights + "</h3>" +
                "<h3 class='info-data-address'>" + address + "</h3>" +
                "<h3 class='info-data-mls'>MLS: " + mls + "</h3>" +
                "</div>" +
                "</div></a>"
            ;
            iw = new google.maps.InfoWindow({
                content: html,
                maxWidth: 283
            });
            iw.open(map, marker);
            google.maps.event.addListener(iw, 'domready', function () {
            var iwOuter = $('.gm-style-iw');
            var iwBackground = iwOuter.prev();
            iwBackground.children(':nth-child(2)').css({'display': 'none'});
            iwBackground.children(':nth-child(4)').css({'display': 'none'});

            var arrow_div = $(".gm-style-iw").prev();

            $("div:eq(0)", arrow_div).css('display', 'none');
            $("div:eq(2)", arrow_div).css('display', 'none');
          });
        });
    }

    $('#property-search').validator().on('submit', function (e) {
        if (e.isDefaultPrevented()) {
            $('#s').addClass('placeholder-error');
        }
    });

    $('.navbar-toggle').click(function () {
        if ($(this).attr('aria-expanded') === "true") {
            $(this).children("i").removeClass("fa-times");
            $(this).children("i").addClass("fa-filter");
        } else {
            $(this).children("i").removeClass("fa-filter");
            $(this).children("i").addClass("fa-times");
        }
    });

    $(".dropdown-menu li a").click(function () {
        $(this).parents(".dropdown").find('.dropdown-toggle').html($(this).text() + ' <span class="caret"></span>');
        $(this).parents(".dropdown").find('.dropdown-toggle').val($(this).data('value'));
    });

    $('#s').click(function () {
        $(this).val('');
    });

    $('#s').focus(function () {
        $(this).val('');
    });

    /*var nbaTeams = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('team'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: hr19.root + '/data/source.json'
    });

    var nhlTeams = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('team'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: hr19.root + '/data/source2.json'
    });

    $('#multiple-datasets .typeahead').typeahead({
            highlight: true
        },
        {
            name: 'nba-teams',
            display: 'team',
            source: nbaTeams,
            templates: {
                header: '<h3 class="league-name">NBA Teams</h3>'
            }
        },
        {
            name: 'nhl-teams',
            display: 'team',
            source: nhlTeams,
            templates: {
                header: '<h3 class="league-name">NHL Teams</h3>'
            }
        });*/

    $('#multiple-datasets .typeahead').typeahead({
        name: 'search',
        prefetch: hr19.root + '/data/source.json'
    });

});

