<? snippet('header') ?>

<? $token = csrf() ?>

<main>

  <? snippet('nav') ?>

  <header class="row row--nopadding">
    <div class="col-xs-12 col-sm-6 col-sm-offset-6">

      <? if($logo = $site->logo()): ?>
        <a href="<?= $site->url() ?>" class="u-block u-relative u-z4">
          <img src="<?= $site->image($logo)->url() ?>" class="header__logo" />
        </a>
      <? endif ?>

    </div>
  </header>

  <div class="u-pv05"></div>

  <? $i = 0; ?>
  <? foreach ($page->children() as $section): ?>

    <? snippet('home-section', array('section' => $section, 'i' => $i)); ?>

    <? $i++; ?>

  <? endforeach; ?>

</main>

<? snippet('footer', ['token' => $token]) ?>
