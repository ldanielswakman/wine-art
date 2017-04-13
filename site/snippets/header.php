<!DOCTYPE html>

<html lang="en">

  <head>

    <? snippet('header-meta') ?>

    <title>
      <? e($page->isHomePage(), $site->title() . ' — ' . $site->home_title(), $page->title() . ' — ' . $site->title() ) ?>
    </title>

    <?
    $css_assets = (c::get('env') === 'DEV') ? array(
      'assets/css/flexboxgrid.min.css',
      'assets/css/style.css',
      ) : array(
      '//cdn.jsdelivr.net/flexboxgrid/6.3.0/flexboxgrid.min.css',
      'assets/css/style.css',
      );

    $js_assets = (c::get('env') === 'DEV') ? array(
      'assets/js/jquery-2.2.3.min.js',
      'assets/js/jquery.smooth-scroll.min.js',
      'assets/js/sticky-kit.min.js',
      'assets/js/scripts.js',
      ) : array(
      'https://code.jquery.com/jquery-2.2.3.min.js',
      '//cdnjs.cloudflare.com/ajax/libs/jquery-smooth-scroll/1.7.2/jquery.smooth-scroll.min.js',
      'assets/js/sticky-kit.min.js',
      'assets/js/scripts.js',
      );
    ?>

    <?= css($css_assets) ?>
    <?= js($js_assets) ?>

    <link rel="shortcut icon" href="<?= url('assets/images/favicon.png') ?>">

    <?if ($page->template() == 'blog' && isset($slug)) : ?>
      <link rel="canonical" href="http://dionysianimpulse.net/<?= $slug ?>/" />
    <? endif ?>

  </head>

  <body class="type--<?= $page->template() ?>">
  