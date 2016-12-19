$(document).ready(function() {

  $('blockquote').each(function() {
    $(this).addClass('i-appearFromRight');
  });

  setTimeout(function() {
    $('body').addClass('isLoaded');
  }, 300);

});
