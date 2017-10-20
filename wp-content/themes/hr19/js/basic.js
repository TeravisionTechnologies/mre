jQuery(document).ready(function () {

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
  if(close != null){
    close.addEventListener('click', function (e) {
      e.preventDefault;
      slideLeft.close();
    });
  }

  // Close menu on menu item clicked
  var close = document.querySelector('#menu-item-24');
  if(close != null){
    close.addEventListener('click', function (e) {
      e.preventDefault;
      slideLeft.close();
    });
  }

});