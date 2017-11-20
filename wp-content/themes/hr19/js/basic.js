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
    $(".property-info-heading").sticky({});

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

    //Panel plus-minus change
    $('.panel-title a').click(function () {
        if ($(this).attr('aria-expanded') === "true") {
            $(this).next("i").removeClass("fa-minus");
            $(this).next("i").addClass("fa-plus");
        } else {
            $(this).next("i").removeClass("fa-plus");
            $(this).next("i").addClass("fa-minus");
        }
    });

    //HOA tooltip
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    //Int property detail map
    /*$('#collapse3').on('hidden.bs.collapse', function () {
        initMap();
    });
    $('#collapse3').on('shown.bs.collapse', function () {
        initMap();
    });*/

    // Show-Hide search map
    $('#map-switch').click(function () {
        $("#search-map").slideToggle();
        $("html, body").animate({scrollTop: 0}, 500);
        $(".property-list").toggleClass('property-list-search');
    });

    // Search form validation
    $('#property-search').validator().on('submit', function (e) {
        if (e.isDefaultPrevented()) {
            $('#s').addClass('placeholder-error');
        }
    });
    $('#property-search-top').validator().on('submit', function (e) {
        if (e.isDefaultPrevented()) {
            $('#s').addClass('placeholder-error');
        }
    });

    //Menu mobile change icon
    $('.navbar-toggle').click(function () {
        if ($(this).attr('aria-expanded') === "true") {
            $(this).children("i").removeClass("fa-times");
            $(this).children("i").addClass("fa-filter");
        } else {
            $(this).children("i").removeClass("fa-filter");
            $(this).children("i").addClass("fa-times");
        }
    });

    //Filters get selected option
    $(".clickdd li a").click(function () {
        $(this).parents(".dropdown").find('.dropdown-toggle').html($(this).text() + ' <span class="caret"></span>');
        $(this).parents(".dropdown").find('.dropdown-toggle').val($(this).data('value'));
    });

    // Clear search input
    $('#s').click(function () {
        $(this).val('');
    });
    $('#s').focus(function () {
        $(this).val('');
    });

    // Autocomplete data from database
    var cities = JSON.parse(hr19.cities);
    var addresses = JSON.parse(hr19.addresses);
    var postalcodes = JSON.parse(hr19.postalcodes);

    var city = $.map(cities, function (q) {
        return {value: q, data: {category: 'Dirección'}};
    });
    var add = $.map(addresses, function (q) {
        return {value: q, data: {category: 'Ciudad'}};
    });
    var pc = $.map(postalcodes, function (q) {
        return {value: q, data: {category: 'Código Postal'}};
    });

    var query = city.concat(add,pc);

    // Initialize autocomplete
    $('#s').devbridgeAutocomplete({
        lookup: query,
        minChars: 1,
        autoSelectFirst: true,
        showNoSuggestionNotice: true,
        noSuggestionNotice: '<p class="no-results"><span>No pudimos encontrar su búsqueda</span><br>Verifique su ortografía o vuelva a hacer su búsqueda usando una ubicación dentro de los E.E.U.U</p>',
        groupBy: 'category',
        onSelect: function (suggestion) {
            $(this).closest('form').submit();
        },
        onSearchError: function (query, jqXHR, textStatus, errorThrown) {
            $("#btn-search-home").attr("disabled", true);
        }
    });

    // Stop propagation (close) propety types dropdown
    $(document).on('click', '#property-type-dd', function (e) {
        e.stopPropagation();
    });
    $(document).on('click', '#price-dd', function (e) {
        e.stopPropagation();
    });


    $(document).on('click', '.clickdd li a', function (e) {
        $(this).closest('form').submit();
    });

    $(document).on('click', '#min-list li a', function (e) {
        $(this).closest('form').submit();
    });

    $(document).on('click', '#max-list li a', function (e) {
        $(this).closest('form').submit();
    });

    // Set input hidden values by selected option clicked
    $("#baths-dd li a").click(function(){
        var selbath = $(this).attr('data-value');
        $("#baths").val(selbath);
    });
    $("#rooms-dd li a").click(function(){
        var selroom = $(this).attr('data-value');
        $("#rooms").val(selroom);
    });
    $("#transction-dd li a").click(function(){
        var seltransc = $(this).attr('data-value');
        $("#transaction").val(seltransc);
    });
    $('#property-type-dd input[type=checkbox]').change(function() {
        if ($('input[type=checkbox]:checked')) {
                var vals = $('input[type=checkbox]:checked').map(function() {
                    return $(this).val();
                }).get().join(',');
                $('#proptype').val(vals);
                $(this).closest('form').submit();
        } else{
            $('#proptype').val("");
            $(this).closest('form').submit();
        }
    });

    // Set min-max values
    $("#min-list li a").click(function(){
        var selmin = $(this).attr('data-value');
        $("#min").val(selmin);
    });
    $("#max-list li a").click(function(){
        var selmax = $(this).attr('data-value');
        $("#max").val(selmax);
    });

    // Filtering data
    $('#property-search-top').submit(function(){
        var filter = $('#property-search-top');
        $.ajax({
            url:filter.attr('action'),
            data:filter.serialize(),
            type:filter.attr('method'),
            beforeSend:function(xhr){
                filter.find('button').html('<i class="fa fa-spinner fa-pulse fa-fw"></i>');
            },
            success:function(data){
                filter.find('button').html('<i class="fa fa-search"></i>');
                $('#response').html(data);
            }
        });
        setTimeout(initialize(), 5000);
        return false;
    });

    //Search Google Maps
    var propertiesArray = [];
    $('.property').each(function () {
        var propertyData = {};
        propertyData.image = $(this).find('.property-image').attr('data-url');
        propertyData.address = $(this).find('.property-address').html();
        propertyData.address = propertyData.address.replace(/[\t\n,]/g, '');
        propertyData.price = $(this).find('.property-price').html();
        propertyData.price = propertyData.price.replace(/[$,]/g, '');
        propertyData.highlights = $(this).find('.property-highlights').html();
        propertyData.highlights = propertyData.highlights.replace(/[\t\n,]/g, '');
        propertyData.mls = $(this).find('.property-code').html();
        propertyData.mls = (propertyData.mls).substring(5);
        propertiesArray.push(propertyData);
    });

    //Search Google Maps
    var locations = [];
    for (var i in propertiesArray) {
        locations.push(propertiesArray[i]);
    }

    var geocoder;
    var map;
    var bounds = new google.maps.LatLngBounds();
    var infowindows = [];
    var activeMarker = '';

    function initialize() {
        map = new google.maps.Map(
            document.getElementById("search-map"), {
                center: new google.maps.LatLng(25.743954, -80.186812),
                zoom: 13,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                mapTypeControl: false,
                fullscreenControl: false
            });
        geocoder = new google.maps.Geocoder();

        for (i = 0; i < locations.length; i++) {
            geocodeAddress(locations, i);
        }
        google.maps.event.addListener(map, 'click', function () {
            if (infowindows.length > 0) {
                var text = activeMarker.price;
                activeMarker.setLabel({text: text, color: 'white', fontFamily: 'Montserrat-Regular', fontSize: '12px'});
                closeInfoWindows();
            }
        });
    }

    google.maps.event.addDomListener(window, "load", initialize);

    function geocodeAddress(locations, i) {
        var priceUnformatted = locations[i].price;
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
        var address = locations[i].address;
        var highlights = locations[i].highlights;
        var mls = locations[i].mls;
        var image = locations[i].image;
        geocoder.geocode({
            'address': address
        },

        function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var marker = new google.maps.Marker({
                    icon: hr19.root + '/assets/pointgreen.svg',
                    map: map,
                    position: results[0].geometry.location,
                    address: address,
                    price: price,
                    highlights: highlights,
                    mls: mls,
                    label: {text: price, color: 'white', fontFamily: 'Montserrat-Regular', fontSize: '12px'},
                    image: image
                });
                marker.addListener('mouseover', function () {
                    if (infowindows == 0) {
                        this.setLabel({
                            text: price,
                            color: '#498306',
                            fontFamily: 'Montserrat-Regular',
                            fontSize: '12px'
                        });
                        this.setZIndex(100);
                        this.setIcon(hr19.root + '/assets/pointwhite.svg');
                    }
                });
                marker.addListener('mouseout', function () {
                    if (infowindows == 0) {
                        this.setLabel({
                            text: price,
                            color: 'white',
                            fontFamily: 'Montserrat-Regular',
                            fontSize: '12px'
                        });
                        this.setZIndex(0);
                        this.setIcon(hr19.root + '/assets/pointgreen.svg');
                    }
                });

                infoWindow(marker, map, price, address, highlights, mls, image);
                bounds.extend(marker.getPosition());
                map.fitBounds(bounds);
            }
                /*else {
                    alert("geocode of " + address + " failed:" + status);
                }*/
            });
    }

    function infoWindow(marker, map, price, address, highlights, mls, image) {
        google.maps.event.addListener(marker, 'click', function () {
            var html = "<a href=property/" + mls + "><div class='info-container'>" +
            "<div class='info-image' style='background-image: url(" + image + ")'></div>" +
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
            if (infowindows.length > 0) {
                closeInfoWindows();
            }
            else {
                iw.open(map, marker);
                infowindows.push(iw);
                activeMarker = this;
                console.log(activeMarker);
            }
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

    function closeInfoWindows() {
        for (var i = 0; i < infowindows.length; i++) {
            infowindows[i].close();
        }
        infowindows = [];
        activeMarker.setIcon(hr19.root + '/assets/pointgreen.svg');
        activeMarker = '';
    }

    $("#min").focus(function() {
        $("#min-list").show();
        $("#max-list").hide();
    });

    $("#max").focus(function() {
        $("#min-list").hide();
        $("#max-list").show();
    });

});

$(window).on('load', function() {
    if($('#presale-list').length){
        var position = $("#presale-list").offset().top;
        var finalPosition = position - 80;
        $('html, body').animate({
            scrollTop: finalPosition
        }, 1000);
    }
    if($('#lease-list').length){
        var position = $("#lease-list").offset().top;
        var finalPosition = position - 80;
        $('html, body').animate({
            scrollTop: finalPosition
        }, 1000);
    }
    /*if($('#presale-list').length){
        var position = $("#presale-list").offset().top;
        var finalPosition = position - 80;
        $('html, body').animate({
            scrollTop: finalPosition
        }, 1000);
    }*/
});


