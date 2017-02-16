<form class="contact-form u-relative" action="<?= $site->url() ?>/contactform_post" method="POST">

  <? if (isset($type) && $type === 'item') { } else { ?>
    <blockquote class="c-white u-mb1"><?= l::get('form_intro') ?></blockquote>
  <? } ?>

  <div class="field-set">
    <textarea name="message" id="message" required class="field field--big u-widthfull u-mb1" placeholder="<?= l::get('form_message_placeholder') ?>"></textarea>
  </div>

  <div class="row row--internalpadding">
    <div class="col-xs-12 col-sm-5">
      <div class="field-set">
        <input name="email" type="email" required class="field u-mb1 u-widthfull" placeholder="<?= l::get('form_email_placeholder') ?>">
      </div>
    </div>
    <div class="col-xs-12 col-sm-4">
      <div class="field-set">
        <input name="name" type="text" class="field u-mb1 u-widthfull" placeholder="<?= l::get('form_name_placeholder') ?>">
      </div>
    </div>

    <input name="language" class="u-hide" type="text" value="<?= $site->language() ?>">

    <input name="source" class="u-hide" type="text" value="<?= (isset($source) && strlen($source) > 1) ? $source : 'Footer'; ?>">

    <?= csrf_field() ?>
    <?= honeypot_field() ?>

    <div class="col-xs-12 col-sm-3">
      <button type="submit" class="button u-mb1 u-widthfull" disabled><?= l::get('form_submit') ?></button>
    </div>
  </div>

  <!-- State: progress -->
  <div id="cover_progress" class="u-pin-cover u-z2 u-flex-center u-aligncenter <?= (isset($type) && $type === 'item') ? 'bg-darkwine' : 'bg-darkblue'; ?> u-pb8 u-hide">
    <img src="<?= url('assets/images/spinner.svg') ?>" alt="" />
  </div>

  <!-- State: success -->
  <div id="cover_success" class="u-pin-cover u-z2 u-flex-center u-aligncenter u-pb8 <?= (isset($type) && $type === 'item') ? 'bg-darkwine' : 'bg-darkblue'; ?> u-hide">
    <div>
      <img src="<?= url('assets/images/check.svg') ?>" alt="" />
      <div class="u-w20 u-mt1 c-white"><?= l::get('form_success_msg') ?></div>
    </div>
  </div>

  <!-- State: fail -->
  <div class="contact-form-errors">
  </div>

</form>
