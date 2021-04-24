// v2019.08.01 

jQuery(function($) {
    $(document).ready(function(){
      var videoLinks = $('.video-lightbox a, a.video-lightbox');
      $(videoLinks).magnificPopup({
        type:'iframe',
        iframe: {
            markup: '<div class="mfp-iframe-scaler">'+
            '<div class="mfp-close"></div>'+
            '<iframe id="player" class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
            '</div>', // HTML markup of popup, `mfp-close` will be replaced by the close button
            patterns: {
                youtube: {
                    index: 'youtube.com/',
                    id: 'v=',
                    src: '//www.youtube.com/embed/%id%?rel=0&autoplay=1&enablejsapi=1'
                }
            },
            srcAction: 'iframe_src',
        },
        callbacks: {
          open: function () {
            new YT.Player('player', {
              events: {
                'onStateChange': onPlayerStateChange
               }
            });
          }
        },
        midClick: true,
        closeOnBgClick: false,
        removalDelay: 500,
        mainClass: 'mfp-fade mfp-video',
    });
    function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.ENDED) {
            $.magnificPopup.close();
        }
    }
      $('.single .main-content img, .page-template-tick-talk .main-content img').featherlight({
        targetAttr: 'src'
      });

      // woocommerce custom qty buttons
      $('.number-qty-buttons .number-qty-up').click(function() {
        var $input = $(this).parents('form.cart').find('input.qty');
        var val = parseInt($input.val(), 10);
        if(val >= 1) {
          $input.val(val + 1);
        }
      });
      
      $('.number-qty-buttons .number-qty-down').click(function() {
        var $input = $(this).parents('form.cart').find('input.qty');
        var val = parseInt($input.val(), 10);
        if(val > 1) {
          $input.val(val - 1);
        }
      });
      
    }); // end document ready
  
});
  