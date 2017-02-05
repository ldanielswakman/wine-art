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


  // UI: grid item click events
  $('.list-item__card').click(function() {
    openCardDetail($(this));
  });
  $('.list-item__detail-close').click(function() {
    closeCardDetail();
  });

  if(window.location.hash) {
    openCardDetail(window.location.hash);
  }


  // UI: read more click events
  $('section a[href="#more"]').click(function() {
    // hide button
    $(this).hide();
    // show more section
    $(this).closest('p').next('.more').css('max-height', 800);
    // show 'less' button
    $(this).closest('p').next('.more').find('a[href="#less"]').show();
  });
  $('section a[href="#less"]').click(function() {
    // hide button
    $(this).hide();
    // 
    $(this).closest('.more').css('max-height', 0);
    $(this).closest('.more').prev('p').find('a[href="#more"]').show();
  });


  gridSpacer();

})



// UI: set space for grid detail placeholder
function gridSpacer() {
  // remove old instances
  $('.list-item .list-item__spacer').remove();

  $('.isExpanded .list-item__detail').each(function() {
    $(this).after('<div class="list-item__spacer" style="height: ' + $(this).outerHeight() + 'px;"></div>');
  });
}



// Update URL hash
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
    $('.list-item').removeClass('isExpanded');
    $(dest).closest('.list-item').addClass('isExpanded');
    $(dest).closest('.list').addClass('hasExpanded');
    gridSpacer();
    $(dest).smoothScroll();

    for (i=1; i < 20; i++) {
      setTimeout(function() { gridSpacer(); }, i*25);
    }

  } else {
    console.log('No card found to expand');
  }
}



// UI: Close Card Detail
function closeCardDetail() {
  $('.list-item').removeClass('isExpanded');
  $('.list').removeClass('hasExpanded');
  updateHash(' ');
  gridSpacer();

  for (i=1; i < 20; i++) {
    setTimeout(function() { gridSpacer(); }, i*25);
  }
}



// Scroll Action
function scrollActions() {
  scroll = $(window).scrollTop();
  windowH = $(window).height();

  allowMobileScroll = ($(window).width() > 767) ? true : false;
  allowMobileScroll = true;

  if (allowMobileScroll) {
    $('.section__bg').each(function() {

      thisTop = $(this).offset().top;
      scrollValue = (scroll - thisTop) / 5 + 20;
      console.log(scrollValue);

      $(this).find('.section__bg-image')
        .css('background-position','center ' + scrollValue + 'px');

    });
  }
}
events = 'ready scroll resize scrollstart scrollstop';
$(document).on(events, function() { scrollActions(); });



// Contact form: contact form interactions
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

// Contact form: show next field on start form
function showNextField(obj) {
  if(obj.val().length > 2 && obj.attr('id') == 'message') {
    obj.closest('.contact-form').find('.i-onevent-appearFromTop').first().addClass('isFired');
  }
}

// Contact form: evaluate form fields
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

// Contact form: evaluate entire form filled
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

// Contact form: format error message
function formatError(msg) {
  if(msg) { return '<div class="bg-softred c-white u-pv05 u-ph1 u-inlineblock u-triangle-topleft u-mb075">' + msg + '</div>'; }
}

// Contact form: post form
function postContactForm(url, form_data) {

  $errors_container.html('');
  $form.find('input, textarea').removeClass('field--error');
  $form.find('#cover_progress').removeClass('u-hide');

  $.post(url, form_data, function(data) {
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
