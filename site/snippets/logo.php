<header class="u-aligncenter">

  <a href="<?= $site->url() ?>" class="header__link">
    <? if($logo = $site->logo_alt()): ?>
      <img src="<?= $site->image($logo)->url() ?>" class="header__logo header__logo--alt" />
    <? else : ?>
      <?= $site->title() ?>
    <? endif ?>
  </a>

</header>
