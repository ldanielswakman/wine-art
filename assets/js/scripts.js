$(document).ready(function() {

  // initiating smooth scroll
  $('a[href^="#"]').smoothScroll({
    afterScroll: function() {
      if(history.pushState) {
        history.pushState(null, null, $(this).attr('href'));
      }
      else {
        location.hash = $(this).attr('href');
      }
    }
  });

  $('blockquote').each(function() {
    $(this).addClass('i-appearFromRight');
  });


  // add isLoaded class to body
  setTimeout(function() {
    $('body').addClass('isLoaded');
  }, 300);


  // set footer spacer
  $('footer').after('<div class="spacer" style="height: ' + $('footer').outerHeight() + 'px;"></div>')


  // grid item click events
  $('.grid-item__card').click(function() {
    $('.grid-item').removeClass('isExpanded');
    $(this).closest('.grid-item').addClass('isExpanded');
    gridSpacer();
  });
  $('.grid-item__detail-close').click(function() {
    $('.grid-item').removeClass('isExpanded');
    gridSpacer();
  });

  gridSpacer();

});

function gridSpacer() {
  // remove old instances
  $('.grid-item .grid-item__spacer').remove();

  $('.isExpanded .grid-item__detail').each(function() {
    $(this).after('<div class="grid-item__spacer" style="height: ' + $(this).outerHeight() + 'px;"></div>');
  });
}
