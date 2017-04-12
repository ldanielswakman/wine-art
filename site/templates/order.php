<? snippet('header') ?>

<? $token = csrf() ?>

<main>

  <? snippet('nav') ?>

  <section class="u-pb7">

    <div class="row u-relative">

      <div class="col-xs-12 col-sm-2">
        <? snippet('logo') ?>
      </div>

      <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-md-6 u-pt7-sm">

        <h1 class="c-greylight u-mb3"><?= $page->title()->html() ?></h1>

        <? $icon = ($page->slug() == 'success') ? 'check' : 'exclamation'; ?>
        <img src="<?= url('assets/images/' . $icon . '.svg') ?>" alt="" class="u-mb3" />

        <div class="short u-text-2x"><?= $page->text()->kirbytext() ?></div>

      </div>
    </div>

  </section>

</main>

<? snippet('footer', ['token' => $token]) ?>
