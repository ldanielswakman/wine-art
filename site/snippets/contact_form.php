<form class="contact-form" action="<?= $page->url() ?>/#below" method="POST">

  <blockquote class="c-white u-mb1"><?= l::get('form_intro') ?></blockquote>

  <div class="field-set">
    <textarea name="message" id="message" required class="field field--big<? e($form->error('message'), ' field--error') ?> u-widthfull u-mb1" placeholder="<?= l::get('form_message_placeholder') ?>"><?= $form->old('message') ?></textarea>
  </div>

  <div class="row row--internalpadding<? e((count($form->errors()) > 0), '', ' i-onevent-appearFromTop') ?>">
    <div class="col-xs-12 col-sm-5">
      <div class="field-set">
        <input name="email" type="email" required class="field<? e($form->error('email'), ' field--error') ?> u-mb1 u-widthfull" placeholder="<?= l::get('form_email_placeholder') ?>" value="<?= $form->old('email') ?>">
      </div>
    </div>
    <div class="col-xs-12 col-sm-4">
      <div class="field-set">
        <input name="name" type="text" class="field<? e($form->error('name'), ' field--error') ?> u-mb1 u-widthfull" placeholder="<?= l::get('form_name_placeholder') ?>" value="<?= $form->old('name') ?>">
      </div>
    </div>

    <?= csrf_field() ?>
    <?= honeypot_field() ?>

    <div class="col-xs-12 col-sm-3">
      <button type="submit" class="button u-mb1 u-widthfull"><?= l::get('form_submit') ?></button>
    </div>
  </div>

  <? if ($form->success()) : ?>
    Thank you for your message. We will get back to you soon!
  <? else : ?>
    <? snippet('uniform/errors', ['form' => $form]) ?>
  <? endif ?>

</form>
