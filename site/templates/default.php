<? snippet('header') ?>

<main>

  <section class="u-pv6">
    <div class="row">
      <div class="col-xs-10 col-xs-offset-1 col-sm-7 col-sm-offset-2 col-md-5 col-md-offset-3">
        <h1 class="u-mb3"><?= $page->title()->html() ?></h1>
        <p><?= $page->text()->kirbytext() ?></p>
      </div>
    </div>
  <section class="u-pv6">

</main>

<? snippet('footer') ?>
