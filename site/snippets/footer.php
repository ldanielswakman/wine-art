    <footer class="bg-darkblue u-pt8 u-pb4">

      <div class="row">

        <div class="col-xs-12 col-sm-5 col-sm-offset-1">
          <form class="contact-form">

            <blockquote class="c-white u-mb1"><?= l::get('form_intro') ?></blockquote>

            <div class="field-set">
              <textarea id="message" required class="field field--big u-widthfull u-mb1" placeholder="<?= l::get('form_message_placeholder') ?>"></textarea>
            </div>

            <div class="row row--internalpadding i-onevent-appearFromTop">
              <div class="col-xs-12 col-sm-5">
                <div class="field-set">
                  <input type="email" required class="field u-mb1 u-widthfull" placeholder="<?= l::get('form_email_placeholder') ?>">
                </div>
              </div>
              <div class="col-xs-12 col-sm-4">
                <div class="field-set">
                  <input type="text" required class="field u-mb1 u-widthfull" placeholder="<?= l::get('form_name_placeholder') ?>">
                </div>
              </div>
              <div class="col-xs-12 col-sm-3">
                <button type="submit" disabled class="button u-mb1 u-widthfull"><?= l::get('form_submit') ?></button>
              </div>
            </div>

          </form>
        </div>

        <div class="col-xs-12 col-sm-4 col-sm-offset-1 u-text-15x footer__menu">
          <? snippet('menu') ?>
        </div>

      </div>

    </footer>

  </body>

</html>
