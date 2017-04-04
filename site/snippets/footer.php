    <footer class="bg-darkblue">

      <div class="row u-pt8 u-pb4">

        <div class="col-xs-12 col-sm-5 col-sm-offset-1">
          <? snippet('contact_form'); ?>
        </div>

        <div class="col-xs-12 col-sm-4 col-sm-offset-1 u-text-15x footer__menu">
          <? snippet('menu') ?>

          <div class="short u-mt6 u-text-1x c-grey">
            <?= $site->footer_address()->kirbytext() ?>
          </div>

        </div>

      </div>

      <a href="http://www.ldaniel.eu" target="_blank" class="footer__colophon-link">
          <em>Designed and built by ldaniel.eu</em>
      </div>

    </footer>

    <? snippet('google_analytics') ?>

  </body>

</html>
