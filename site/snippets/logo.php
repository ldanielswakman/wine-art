<header class="u-pv6 u-aligncenter">
  <a href="<?= $site->url() ?>">
    <? if($logo = $site->logo()): ?>
      <img src="<?= $site->image($logo)->url() ?>" class="header__logo" />
    <? else : ?>
      <?= $site->title() ?>
    <? endif ?>
  </a>
</header>
