export default {
  init() {
    // JavaScript to be fired on all pages


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


  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
