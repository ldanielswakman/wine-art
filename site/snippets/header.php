<!DOCTYPE html>

<html lang="en">

  <head>

    <? snippet('header-meta') ?>

    <title>
      <? e($page->isHomePage(), $site->title() . ' — ' . $site->home_title(), $page->title() . ' — ' . $site->title() ) ?>
    </title>

    <?= css('assets/css/flexboxgrid.min.css') ?>
    <?= css('assets/css/style.css') ?>

    <?= js('assets/js/jquery-2.2.3.min.js') ?>
    <?= js('assets/js/jquery.smooth-scroll.min.js') ?>
    <?= js('assets/js/scripts.js') ?>

    <link rel="shortcut icon" href="<?= url('assets/images/favicon.png') ?>">

  </head>

  <body>

    <nav>
      <? snippet('menu') ?>
    </nav>