<? snippet('header') ?>

<main>

  <div class="row">

    <div class="col-xs-12 col-md-2">
      <? snippet('logo') ?>
    </div>

    <? if($page->cover_image()->isNotEmpty()): ?>
      <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2" style="margin-bottom: -15rem;">
        <img src="<?= thumb($page->image($page->cover_image()), ['width' => 600])->url() ?>" alt="" />
      </div>
    <? endif ?>

    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 u-pt6">

      <?= $page->text()->kirbytext() ?>

      <?
      $list_options = ($page->list_type()->isNotEmpty() && $page->list_type()->value() == 'large') ? array(
        'snippet_size' => 150,
        'item_size_class' => 'col-sm-6',
        'item_ptop' => ''
      ) : array(
        'snippet_size' => 90,
        'item_size_class' => 'col-sm-6',
        'item_ptop' => ''
      );
      ?>

      <div class="row row--internalpadding grid">
        <? $i = 1; foreach ($page->children()->visible() as $item) : ?>

          <? snippet('list-item', ['i' => $i, 'item' => $item, 'list_options' => $list_options]) ?>
          
        <? $i++; endforeach ?>
      </div>

    </div>

  </div>

</main>

<? snippet('footer') ?>
