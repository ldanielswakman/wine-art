    <div class="footer-spacer"></div>

    <footer class="bg-darkblue u-pb4">

      <div class="row">
        <div class="col-sm-5 col-sm-offset-1 u-pv4">
          <blockquote class="c-white u-mb1">Say hello</blockquote>
          <textarea class="field field--big u-widthfull" placeholder="Hello wonderful people at wine•art, ..."></textarea>
        </div>
        <div class="col-sm-4 col-sm-offset-1 u-pv4" style="font-size: 1.5rem;">
            <? foreach ($site->pages()->visible() as $page) : ?>
              <div class="u-pv025">
                <a class="c-white <? e($page->isOpen(), 'u-underline') ?>" href="<?=$page->url() ?>"><?= strtolower($page->title()->html()) ?></a>
              </div>
            <? endforeach ?>
        </div>
      </div>

    </footer>

    <script>
      // makes footer tucked under main, minus 2px for buffer
      $('.footer-spacer').css('height', ($('footer').outerHeight() - 5) );
    </script>

  </body>

</html>
