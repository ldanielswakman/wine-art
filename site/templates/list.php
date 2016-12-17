<? snippet('header') ?>

<div class="row">

  <div class="col-xs-12 col-sm-2">

    <? snippet('logo') ?>

  </div>

  <div class="col-sm-8 u-pv6">

    <?= $page->text()->kirbytext() ?>

    <div class="row row--internalpadding u-mt6">
      <? $i = 1; foreach ($page->items()->toStructure() as $item) : ?>

        <div class="col-sm-5<?= ($i%2 == 0) ? ' col-sm-offset-1 u-pt6' : '' ?> u-pb0">
          <? if($image = $item->image()): ?>
            <figure class="figure--3by2"><img src="<?= $page->image($image)->url() ?>" alt="" /></figure>
          <? endif ?>
          <h3 class="u-mv1"><?= $item->title()->html() ?></h3>
          <p class="short c-grey"><?= excerpt($item->description(), 90) ?></p>
          <a href="#" class="link u-mt1">Read more</a><br>
          <a href="#" class="link link--secondary u-mt025">Purchase &nbsp;+</a>
        </div>
        
      <? $i++; endforeach ?>
    </div>

  </div>

</div>

<? snippet('footer') ?>
