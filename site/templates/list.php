<? snippet('header') ?>

<main>

  <div class="row">

    <div class="col-xs-12 col-sm-2">
      <? snippet('logo') ?>
    </div>

    <? if($page->cover_image()->isNotEmpty()): ?>
      <div class="col-xs-12 col-sm-8 col-sm-offset-2" style="margin-bottom: -15rem;">
        <img src="<?= thumb($page->image($page->cover_image()), ['width' => 600])->url() ?>" alt="" />
      </div>
    <? endif ?>

    <div class="col-xs-12 col-sm-8 col-sm-offset-2 u-pv6">

      <?= $page->text()->kirbytext() ?>

      <?
      $list_options = ($page->list_type()->isNotEmpty() && $page->list_type()->value() == 'large') ? array(
        'snippet_size' => 300,
        'item_size_class' => 'col-sm-12',
        'item_ptop' => 'u-pt1'
      ) : array(
        'snippet_size' => 90,
        'item_size_class' => 'col-sm-5',
        'item_ptop' => 'u-pt10'
      );
      ?>

      <div class="row row--internalpadding u-mt6">
        <? $i = 1; foreach ($page->children()->visible() as $item) : ?>

          <? snippet('list-item', ['i' => $i, 'item' => $item, 'list_options' => $list_options]) ?>
          
        <? $i++; endforeach ?>
      </div>

    </div>

  </div>

</main>

<? snippet('footer') ?>
