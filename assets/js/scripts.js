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
    $(this).addClass('i-onload-appearFromRight');
  });


  // add isLoaded class to body
  setTimeout(function() {
    $('body').addClass('isLoaded');
  }, 300);


  // set footer spacer
  $('footer').after('<div class="spacer" style="height: ' + $('footer').outerHeight() + 'px;"></div>')


  // grid item click events
  $('.grid-item__card').click(function() {
    openCardDetail($(this));
  });
  $('.grid-item__detail-close').click(function() {
    closeCardDetail();
  });

  if(window.location.hash) {
    openCardDetail(window.location.hash);
  }

  gridSpacer();

});

function gridSpacer() {
  // remove old instances
  $('.grid-item .grid-item__spacer').remove();

  $('.isExpanded .grid-item__detail').each(function() {
    $(this).after('<div class="grid-item__spacer" style="height: ' + $(this).outerHeight() + 'px;"></div>');
  });
}



// UI: Open Card Detail
function openCardDetail(dest) {
  if($(dest)) {
    $('.grid-item').removeClass('isExpanded');
    $(dest).closest('.grid-item').addClass('isExpanded');
    gridSpacer();
    $(dest).smoothScroll();
  } else {
    console.log('No card found to expand');
  }
}



// UI: Close Card Detail
function closeCardDetail() {
  $('.grid-item').removeClass('isExpanded');
  gridSpacer();
}



// UI: listen for field-box empty
$(document).ready(function() {
  $('.field').bind('keyup change', function() {
    checkFieldBoxLabel($(this));
    showNextField($(this));
    checkFormFields($(this));
  });
  $('.field').each(function() {
    checkFieldBoxLabel($(this));
  });
});
function checkFieldBoxLabel(obj) { 
  if(obj.val().length > 0) {
    obj.addClass('field--notempty');
    obj.removeClass('field--error');
  } else {
    obj.removeClass('field--notempty');
  }
}
function showNextField(obj) { 
  if(obj.val().length > 2 && obj.attr('id') == 'message') {
    obj.closest('.contact-form').find('.i-onevent-appearFromTop').first().addClass('isFired');
  }
}
function checkFormFields(obj) {
  $form = obj.closest('.contact-form');
  completed = true;
  $form.find('input[required],textarea[required]').each(function() {
    if($(this).val().length < 1) {
      completed = false;
      return false;
    }
  });
  if(completed === true) { 
    $form.find('button[type="submit"]').removeAttr('disabled');
  } else {
    $form.find('button[type="submit"]').attr('disabled', 'disabled');
  }
}
