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

  setTimeout(function() {
    $('body').addClass('isLoaded');
  }, 300);

  matchHeight();

});

function matchHeight() {
  $('[class*="-spacer"]').each(function() {
    target_name = $(this).attr('class').replace('-spacer', '');
    $target = $(this).parent().find('.' + target_name);
    if ( $(this).prev().is(target_name) || $(this).attr('id') == target_name) {
      $target = $(this).prev();
    }
    $(this).css('height', $target.outerHeight() );
  });
}