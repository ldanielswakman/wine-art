<!DOCTYPE html>

<html lang="en">

  <head>

    <title><?= $site->title() ?></title>

    <?= css('assets/css/flexboxgrid.min.css') ?>
    <?= css('assets/css/style.css') ?>

    <?= js('assets/js/jquery-2.2.3.min.js') ?>
    <?= js('assets/js/scripts.js') ?>

  </head>

  <body>

    <header class="u-aligncenter u-pv6">

      <? if($logo = $site->logo()): ?>
        <img src="<?= $site->image($logo)->url() ?>" class="header__logo" />
      <? else : ?>
        <?= $site->title() ?>
      <? endif ?>

    </header>