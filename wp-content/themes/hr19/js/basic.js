jQuery(document).ready(function () {

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
    var geocoder = new google.maps.Geocoder();
    var map = new google.maps.Map(document.getElementById('search-map'), {
      zoom: 4
    });
    var propertiesArray = [];
    $('.property').each(function(){
      var propertyData = {};
      propertyData.address = $(this).find('.property-address').html();
      propertyData.price = $(this).find('.property-price').html();
      propertyData.highlights = $(this).find('.property-highlights').html();
      propertyData.mls = $(this).find('.property-code').html();
      propertiesArray.push(propertyData);
    });

    // DATA DE PRUEBA
    var addressArray = [
      {address: 'Miami, Florida, EE. UU.', price:'10000', mls:'1258649'},
      {address:'Caracas, Distrito Capital', price:'15000', mls:'1258649'},
      {address:'Santo Domingo, República Dominicana', price:'15000', mls:'1258649'},
    ];
    // DATA DE PRUEBA

    for (var i in addressArray) {
      //Change map markers currency format
      var labelString = '';
      if(addressArray[i].price > 999  && addressArray[i].price < 1000000) {
        labelString = '$' + (addressArray[i].price/1000) + 'K';
      }
      else if (addressArray[i].price >= 1000000) {
        labelString = '$' + (addressArray[i].price/1000000) + 'm';
      }
      else {
        labelString = '$' + addressArray[i].price;
      }

      //Info Windows for each property
      var contentString = '<div><h2>' + addressArray[i].price + '</h2><h3>MLS: ' + addressArray[i].mls + '</h3></div>';
      geocoder.geocode( { 'address': addressArray[i].address}, function(results, status) {
        if (status == 'OK') {
          map.setCenter(results[0].geometry.location);
          var infowindow = new google.maps.InfoWindow({
            content: contentString
          });
          var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location,
            icon: hr19.root + '/assets/map-icon.svg',
            label: { text: labelString, color: 'white', fontFamily: 'Montserrat-Regular', fontSize: '12px' }
          });
          marker.addListener('mouseover', function() {
            infowindow.open(map, marker);
            this.setLabel({ text: labelString, color: 'black', fontFamily: 'Montserrat-Regular', fontSize: '12px' });
            this.setIcon(hr19.root + '/assets/map-icon.svg');
          });
          marker.addListener('mouseout', function() {
            infowindow.close();
            this.setLabel({ text: labelString, color: 'white', fontFamily: 'Montserrat-Regular', fontSize: '12px' });
            this.setIcon(hr19.root + '/assets/map-icon.svg');
          });
        } else {
          alert('Geocode was not successful for the following reason: ' + status);
        }
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

});

