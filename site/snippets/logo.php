<header class="u-pv3 u-aligncenter">
  <a href="<?= $site->url() ?>" class="u-inlineblock u-pa4">
    <? if($logo = $site->logo()): ?>
      <img src="<?= $site->image($logo)->url() ?>" class="header__logo" />
    <? else : ?>
      <?= $site->title() ?>
    <? endif ?>
  </a>
</header>
