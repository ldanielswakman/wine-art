<? snippet('header') ?>

<main class="bg-white u-pv8">
  <div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3">
      <h1 class="c-dullblue u-mb3"><?= $page->title()->html() ?></h1>
      <blockquote class="u-mb6"><?= $page->text()->kirbytext() ?></blockquote>
      <a href="<?= $site->url() ?>" class="link">Home</a>
    </div>
  </div>
</main>

<? snippet('footer') ?>
