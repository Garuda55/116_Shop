$(document).ready(function () {
  $(".owl-carousel-full").owlCarousel({
    // loop: true,
    margin: 20,
    // nav: true,
    responsive: {
      0: {
        items: 1,
      },
      575: {
        items: 2,
      },
      767: {
        items: 3,
      },
      1000: {
        items: 4,
      },
    },
  });
});
