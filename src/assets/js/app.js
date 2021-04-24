import $ from 'jquery';
import whatInput from 'what-input';

window.$ = $;
import Foundation from 'foundation-sites';
// If you want to pick and choose which modules to include, comment out the above and uncomment
// the line below
//import './lib/foundation-explicit-pieces';

import './lib/demosite';

$(document).foundation();


// shows the overlay on top of the employee photos
$('.employee-more').on('click', function() {
  $('.grid .overlay').removeClass('active');
  $(this).parents().eq(1).next('.overlay').addClass('active');
});

// hides the overlay on top of the employee photos
$('.employee-less').on('click', function() {
  $('.grid .overlay').removeClass('active');
});

// mobile navigation trigger
$('.mobile-nav-trigger').on('click', function() {
  $('.drawer').addClass('active');
  $('body').css('overflow','hidden');
});
$('.close-icon').on('click', function() {
  $('.drawer').removeClass('active');
  $('body').css('overflow','auto');
});

$(function(){
  jQuery( document.body ).on( 'checkout_error', function() {
    jQuery( 'html, body' ).stop();
    $("html, body").animate({ scrollTop: 0 }, "slow");
} );
});

// if(window.location.href.indexOf("/checkout/") == -1 && window.location.href.indexOf("/cart/") == -1 && window.location.href.indexOf("/product/") == -1) {
//   if(window.location.href.indexOf("/physician/") > -1) {
//      setCookie('igxselect','physician',7);
//   } else {
//      setCookie('igxselect','patient',7);
//   }
// }


// function setCookie(name,value,days) {
//     var expires = "";
//     if (days) {
//         var date = new Date();
//         date.setTime(date.getTime() + (days*24*60*60*1000));
//         expires = "; expires=" + date.toUTCString();
//     }
//     document.cookie = name + "=" + (value || "")  + expires + "; path=/";
// }
// function getCookie(name) {
//     var nameEQ = name + "=";
//     var ca = document.cookie.split(';');
//     for(var i=0;i < ca.length;i++) {
//         var c = ca[i];
//         while (c.charAt(0)==' ') c = c.substring(1,c.length);
//         if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
//     }
//     return null;
// }
// function eraseCookie(name) {
//     document.cookie = name+'=; Max-Age=-99999999;';
// }


// // if ( $( "#kit-table" ).length ) {
// // // $('#kit-table').foundation('down', $("#drawer1"));
// // };
// //
// if ( $( ".interpret" ).length ) {
//   // $("#int").foundation('down',$("#drawer-1"));
// };


$( document ).ready(function() {

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
  $('.single .main-content img:not(.no-lightbox), .page-template-tick-talk .main-content img:not(.no-lightbox)').featherlight({
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
  

  
  var $grid = $('.grid').masonry({
    columnWidth: '.grid-sizer',
    itemSelector: '.grid-item',
    percentPosition: true,
    horizontalOrder: true
  });

  $grid.masonry();

    $('.grid .size-full').featherlight({
      targetAttr: 'src'
    });

    $('.clicker').on('click', function() {

    var empId = '.' + $(this).attr('data-item');
    console.log(empId);
    $(empId).toggle();
    $grid.masonry();

  });


  $('.mobile .dropdown').on('click', function(e) {
    // e.preventDefault();
    $(this).find('.sub-menu').slideToggle(300);
    $(this).toggleClass('active');
  });




  // to top right away
  if ( window.location.hash ) scroll(0,0);
  // void some browsers issue
  setTimeout( function() { scroll(0,0); }, 1);

  $(function() {

    // your current click function
    $('.scroll').on('click', function(e) {
      // console.log(this);
        e.preventDefault();


        var foo = $($(this).attr('href')).offset().top - 201 + 'px';
        function scrollDrawer(){
          $('html, body').animate({
              scrollTop: foo
          }, 1000, 'swing');
        }
        setTimeout(scrollDrawer, 100);
    });

    // *only* if we have anchor on the url
    if(window.location.hash) {

        // smooth scroll to the anchor id
        $('html, body').animate({
            scrollTop: $(window.location.hash).offset().top - 201 + 'px'
        }, 1000, 'swing');
    }

  });

 // Symptom Checker
  if($('#symptom-checker-container').length){
    
    var sections = '<div id="symtom-checker-sections" class="flex-container">\
        <div class="flex-item background-information-cell">\
            <div class="circle">1.</div>\
            <div class="section-title">Background Information</div>\
            <hr class="short-hr" />\
            <!--<div class="section-description"></div>-->\
        </div>\
        <div class="flex-item quick-symptom-check-cell">\
            <div class="circle">2.</div>\
            <div class="section-title">Quick Symptom Check</div>\
            <hr class="short-hr" />\
            <!--<div class="section-description"></div>-->\
        </div>\
        <div class="flex-item other-illness-risks-cell">\
            <div class="circle">3.</div>\
            <div class="section-title">Are you at risk for other Tickborne Illnesses?</div>\
            <hr class="short-hr" />\
            <!--<div class="section-description"></div>-->\
        </div>\
        <div class="flex-item results-cell">\
            <div class="circle">4.</div>\
            <div class="section-title">Results Information</div>\
            <hr class="short-hr" />\
            <!--<div class="section-description">Section Description</div>-->\
        </div>\
    </div>';

    function receiveMessage(event) {
        console.log(event.data);

        if(typeof(event.data.cat) !== "undefined" && event.data.cat != "") {
            //$("#symtom-checker-sections").removeClass("active");
            var section = event.data.cat

            if($("#symtom-checker-sections").length == 0){
                $("#symtom-checker-intro-hero").hide();
                $(".symptom-checker-hero").append(sections);
            }

            $(".flex-item").removeClass("active");
            $("."+event.data.cat+"-cell").addClass("active");

  //                    //$("#symtom-checker-intro-hero").removeClass("active");
  //                    //$("#symtom-checker-sections").css({"display":"none"});
  //                    //$("#symtom-checker-intro-hero").css({"display":"block"});
  //                    //$(".flex-item").removeClass("active");
  //                    //$("#symtom-checker-intro-hero").addClass("active");

        }
        if(typeof(event.data.resize) !== "undefined" && event.data.resize != "") {
            
            // scroll top on mobile
            if($(window).width() <= 1024){
                window.scrollTo(0, 0);
            }
            // resize to iframe to survey height
            $(".surveygizmo_link").height(event.data.resize);

  //                    //scroll to survey content if that was the postMessage sent.
  //                    if(event.data == "take-the-quiz") {
  //                        $('html, body').animate({
  //                            scrollTop: 600,
  //                        }, 500);
  //                    }
        }


    }
    // listen for messages dispatched by the iframe
    window.addEventListener("message", receiveMessage, false);
  } // end if length

  // Isotope
  var $grid = $('.isotope-grid > .elementor-column-wrap > .elementor-widget-wrap ').isotope({
    // options
    itemSelector: '.elementor-widget',
    layoutMode: 'masonry'
  });

  // store filter for each group
  var filters = {};

  $('.resource-center-filters').on( 'click', '.elementor-button', function() {
    var $this = $(this);
    // get group key
    var $buttonGroup = $this.parents('.button-filter-group');
    var filterGroup = $buttonGroup.attr('data-filter-group');

    // set filter for group
    // get the actual filter which is higher in the DOM
    var currentFilter = $this.parents('.elementor-widget-button');

    filters[ filterGroup ] = currentFilter.attr('data-filter');

    // combine filters
    var filterValue = concatValues( filters );
    $grid.isotope({ filter: filterValue });
   
  });
  // change is-checked class on buttons
  $('.button-filter-group').each( function( i, buttonGroup ) {
    var $buttonGroup = $( buttonGroup );
    $buttonGroup.on( 'click', '.elementor-button', function( event ) {
      $buttonGroup.find('.is-checked').removeClass('is-checked');
      var $button = $( event.currentTarget );
      var $buttonParent = $button.parents('.elementor-widget-button');
      $buttonParent.addClass('is-checked');
    });
  });
  $('.resource-center-grid .elementor-widget-image-box .elementor-image-box-img a').each(function(){
    //get the href
    var current_href = $(this).attr('href');
    // var current_title = $(this).parentsUntil('.elementor-image-box-wrapper').parent().find('.elementor-image-box-title');
    var current_desc = $(this).parentsUntil('.elementor-image-box-wrapper').parent().find('.elementor-image-box-description');

    // $(current_title).wrap('<a href="' + current_href + '" target="_blank"></a>');
    $(this).parentsUntil('.elementor-image-box-wrapper').parent().prepend('<a class="wrapper-link" href="' + current_href + '" target="_blank"></a>');

    $(current_desc).wrapInner('<a href="' + current_href + '" target="_blank"></a>');
  });
  
  // flatten object by concatting values
  function concatValues( obj ) {
    var value = '';
    for ( var prop in obj ) {
      value += obj[ prop ];
    }
    return value;
  }

  // Update the grid after a lazy loaded image is loaded.
  if($('.isotope-grid > .elementor-column-wrap > .elementor-widget-wrap').length){
    // Listen for the pdf-loading message being removed
    var image_is_loaded = new MutationObserver(function(mutations) {
      mutations.forEach(function(mutation) {
          if($('.elementor-image-box-img img').data('was-processed') == true) {
            console.log('processed');
            var grid_update = $grid.isotope('layout');
          }
      });
    });
    image_is_loaded.observe(document.documentElement, {
      attributes: true,
      characterData: true,
      childList: true,
      subtree: true,
      attributeOldValue: true,
      characterDataOldValue: true
    });
}



}); // end document ready
