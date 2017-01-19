$(document).ready(function() {

  // initiating smooth scroll
  $('a[href^="#"]').smoothScroll({
    afterScroll: function() {
      updateHash($(this).attr('href'));
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
  $('footer').after('<div id="below" class="spacer" style="height: ' + $('footer').outerHeight() + 'px;"></div>')


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

function updateHash(href) {
  if(history.pushState) {
    history.pushState(null, null, href);
  }
  else {
    location.hash = href;
  }
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
  updateHash('#');
  gridSpacer();
}



// UI: contact form interactions
$(document).ready(function() {
  $('.field').bind('keyup change', function() {
    checkFieldContent($(this));
    showNextField($(this));
    checkFormFields($(this));
  });
  $('.field').each(function() {
    checkFieldContent($(this), false);
  });
  checkFormFields($(this));

  // Async form submit
  $form = $('.contact-form');
  $errors_container = $form.find('.contact-form-errors');
  fields = [];
  $form.find('[name]').each(function(i) { fields[$(this).attr('name')] = i; });

  $form.on('submit', function(e) {
    e.preventDefault();
    postContactForm( $(this).attr('action'), $(this).serialize() );
  });

});

function checkFieldContent(obj, errorcheck) {
  errorcheck = (typeof errorcheck !== 'undefined' && errorcheck == false) ? false : true;
  if(obj.val().length > 0) {
    obj.addClass('field--notempty');
    if (errorcheck == true) {
      obj.removeClass('field--error');
    }
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

  // Check if form is started
  started = false;
  $form.find('input,textarea').each(function() {
    if($(this).val().length > 0) {
      started = true;
      return false;
    }
  });
  if(started === true) {
    $('.i-onevent-appearFromTop').addClass('isFired');
  }

  // Check if form is completed
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
function formatError(msg) {
  if(msg) { return '<div class="bg-softred c-white u-pv05 u-ph1 u-inlineblock u-triangle-topleft u-mb075">' + msg + '</div>'; }
}
function postContactForm(url, form_data) {

  $errors_container.html('');
  $form.find('input, textarea').removeClass('field--error');
  $form.find('#cover_progress').removeClass('u-hide');

  $.post(url, form_data, function(data) {
    console.log(data);
    $form.find('#cover_progress').addClass('u-hide');
    if(data.success === true) {
      
      $form.find('#cover_progress').addClass('u-hide');
      $form.find('#cover_success').removeClass('u-hide');

    } else {

      $html = '';
      $.each(data.errors, function(i, j) {
        $form.find('[name="'+i+'"]').addClass('field--error');
        $html += formatError(data.errors[i]);
      });
      if(data.code === 500) {
        $html += formatError('Something went wrong — please try again later.')
      }
      $errors_container.html($html);

    }
  });
}
