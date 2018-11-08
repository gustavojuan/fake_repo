export default {
  init() {
    // JavaScript to be fired on all pages
      console.log("init");

      $('body').on('mouseenter mouseleave', '.dropdown', function (e) {
          var dropdown = $(e.target).closest('.dropdown');
          var menu = $('.dropdown-menu', dropdown);
          dropdown.addClass('show');
          menu.addClass('show');
          setTimeout(function () {
              dropdown[dropdown.is(':hover') ? 'addClass' : 'removeClass']('show');
              menu[dropdown.is(':hover') ? 'addClass' : 'removeClass']('show');
          }, 300);
      });


      $('.image-link').magnificPopup({type:'image'});


      $('#search-button').on('click', function(e) {
          if($('#search-input-container').hasClass('hdn')) {
              e.preventDefault();
              $('#search-input-container').removeClass('hdn')
              return false;
          }
      });

      $('#hide-search-input-container').on('click', function(e) {
          e.preventDefault();
          $('#search-input-container').addClass('hdn')
          return false;
      });

      $('#headquarters_map').imageMapResize();

      $('#headquarters_map area').on('click', function (e) {
          e.preventDefault();
          console.log($(this));
      })




  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
      console.log("finalize");
  },
};
