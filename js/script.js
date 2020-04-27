$( 'header .navbar-nav a' ).on( 'click', function () {
	$( 'header .navbar-nav' ).find( 'li.active' ).removeClass( 'active' );
	$( this ).parent( 'li' ).addClass( 'active' );
});

// $('body').scrollspy({ target: '#mainmenu-area' })

// ocultar menu desplegable cuando se da click en algun link
$(".nav-link").on("click", function () {
  $(".navbar-collapse").collapse("hide");
});

$(".dropdown-item").on("click", function () {
  $(".navbar-collapse").collapse("hide");
});

// Cerrar navbar collapse con click fuera
$(document).ready(function () {
  $(document).click(function (event) {
      var clickover = $(event.target);
      var _opened = $(".navbar-collapse").hasClass("show");
      if (_opened === true && !clickover.hasClass("navbar-toggler")) {
          $(".navbar-toggler").click();
      }
  });
});

var swiperMobile = new Swiper('.swiper-container.swiper-full-mobile', {
  slidesPerView: 5,
  spaceBetween: 30,
  slideToClickedSlide:true,
  centeredSlides:true,
 pagination: {
    el: '.swiper-pagination',
    clickable: true,

  },

  loop:true,
    autoplay:{
      delay: 3000,
    },


    keyboard: {
    enabled: true,
    onlyInViewport: true,
  },


  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },


   breakpoints: {
    1800: {
      freemode:true,
      slidesPerView: 5,
      spaceBetween: 10,
    },
        835: {
          freemode:true,
          slidesPerView: 3,
          spaceBetween: 20,
        },
        320: {
          freemode:true,
          slidesPerView: 1,
          spaceBetween: 20,
        }
  }

});

