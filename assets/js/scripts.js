$(document).ready(function() {

  $('blockquote').each(function() {
    $(this).addClass('i-appearFromRight');
  });

  setTimeout(function() {
    $('body').addClass('isLoaded');
  }, 300);

});


/*
 * Scroll actions
 */
$(document).on('ready scroll resize scrollstart scrollstop', function() { scrollActions() });

function scrollActions() {
  scroll = $(window).scrollTop();



  // nav animation
  pageH = $(document).outerHeight();
  windowH = $(window).outerHeight();
  footerH = $('footer').outerHeight();
  trackValue = (scroll - pageH + windowH + footerH) / footerH;

  if(trackValue < 0) {
    $('nav, nav a').removeAttr('style');
  } else if(trackValue >= 0 && trackValue < 1) {
    degrees = (1 - trackValue) * 90;
    percent = trackValue * 100;

    $('nav').css('-webkit-transform','rotate(-' + degrees + 'deg) translate(' + (100 - percent) + '%, -' + (percent/20) + '%) scale(' + (1 + trackValue/2) + ')')
    .css('-moz-transform','rotate(-' + degrees + 'deg) translate(' + (100 - percent) + '%, -' + (percent/20) + '%) scale(' + (1 + trackValue/2) + ')')
    .css('transform','rotate(-' + degrees + 'deg) translate(' + (100 - percent) + '%, -' + (percent/20) + '%) scale(' + (1 + trackValue/2) + ')')
    .css('opacity', trackValue)
    .css('right', (trackValue * 20) + '%');
    $('nav a').css('color', 'rgb(' + (76 + percent*3) + ', ' + (109 + percent*3) + ', ' + (143 + percent*3) + ')');
  } else {
    $('nav').css('-webkit-transform','rotate(0deg) translate(0, -5%) scale(1.5)')
    .css('-moz-transform','rotate(0deg) translate(0, -5%) scale(1.5)')
    .css('transform','rotate(0deg) translate(0, -5%) scale(1.5)')
    .css('opacity', 1)
    .css('right', '20%');
    $('nav a').css('color', '#fff');
  }
  // $('nav').
}
