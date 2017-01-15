<? snippet('header') ?>

<main>

  <div class="row">

    <div class="col-xs-12 col-sm-2">

      <? snippet('logo') ?>

    </div>

    <div class="col-xs-12 col-sm-8 u-pv6">

      <?= $page->text()->kirbytext() ?>

      <div class="row row--internalpadding u-mt6">
        <? $i = 1; foreach ($page->children()->visible() as $item) : ?>

          <? snippet('list-item', ['i' => $i, 'item' => $item]) ?>
          
        <? $i++; endforeach ?>
      </div>

    </div>

  </div>

</main>

<? snippet('footer') ?>
