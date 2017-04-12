<form class="contact-form u-relative" action="<?= $site->url() ?>/contactform_post" method="POST">

  <?
  $type = (isset($type)) ? $type : null;
  $source = (isset($source)) ? $source : null;
  ?>

  <? if ($type !== 'item') : ?>
    <blockquote class="c-white u-mb1"><?= l::get('form_intro') ?></blockquote>
  <? endif ?>

  <div class="field-set">
    <textarea name="message" id="message" required class="field field--big <?= ecco(($type == 'item'), 'field--dark') ?> u-widthfull u-mb1" placeholder="<?= l::get('form_message_placeholder') ?>"></textarea>
  </div>

  <div class="row row--internalpadding">
    <div class="col-xs-12 col-sm-5">
      <div class="field-set">
        <input name="email" type="email" required class="field <?= ecco(($type == 'item'), 'field--dark') ?> u-mb1 u-widthfull" placeholder="<?= l::get('form_email_placeholder') ?>">
      </div>
    </div>
    <div class="col-xs-12 col-sm-4">
      <div class="field-set">
        <input name="name" type="text" class="field <?= ecco(($type == 'item'), 'field--dark') ?> u-mb1 u-widthfull" placeholder="<?= l::get('form_name_placeholder') ?>">
      </div>
    </div>

    <input name="language" class="u-hide" type="text" value="<?= $site->language() ?>">

    <input name="source" class="u-hide" type="text" value="<?= ecco((strlen($source) > 1), $source, 'Footer') ?>">

    <?= csrf_field($token) ?>
    <?= honeypot_field() ?>

    <div class="col-xs-12 col-sm-3">
      <button type="submit" class="button u-mb1 u-widthfull" disabled><?= l::get('form_submit') ?></button>
    </div>
  </div>

  <!-- State: progress -->
  <div id="cover_progress" class="u-pin-cover u-z2 u-flex-center u-aligncenter <?= ($type === 'item') ? 'bg-greylighter c-dullblue' : 'bg-darkblue'; ?> u-hide">
    <img src="<?= url('assets/images/spinner.svg') ?>" alt="" />
  </div>

  <!-- State: success -->
  <div id="cover_success" class="u-pin-cover u-z2 u-flex-center u-aligncenter <?= ($type === 'item') ? 'bg-greylighter c-dullblue' : 'bg-darkblue c-white'; ?> u-hide">
    <div>
      <img src="<?= url('assets/images/check.svg') ?>" alt="" />
      <div class="u-w20 u-mt1"><?= (isset($success_msg) && strlen($success_msg) > 1) ? $success_msg : l::get('form_success_msg') ?></div>
    </div>
  </div>

  <!-- State: fail -->
  <div class="contact-form-errors">
  </div>

</form>
