<? snippet('header') ?>

<main>

  <div class="row row--internalpadding">

    <div class="col-xs-12 col-sm-2">
      <? snippet('logo') ?>
    </div>

    <? if($page->cover_image()->isNotEmpty()): ?>
      <div class="col-xs-9 col-xs-offset-3 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-4" style="margin-bottom: -10rem;">
        <figure class="figure--3by2">
          <img src="<?= thumb($page->image($page->cover_image()), ['width' => 800])->url() ?>" alt="" />
        </figure>
      </div>
    <? endif ?>

    <div class="col-xs-12 col-sm-10 col-md-9<? if($page->cover_image()->isNotEmpty()) { echo ' col-sm-offset-2'; } ?> u-pt7-sm">
      <?= $page->text()->kirbytext() ?>
    </div>

    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

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

      <div class="row row--internalpadding list">
        <? $i = 1; foreach ($page->children()->visible() as $item) : ?>

          <? snippet('list-item', ['i' => $i, 'item' => $item, 'list_options' => $list_options]) ?>
          
        <? $i++; endforeach ?>
      </div>

    </div>

  </div>

</main>

<? snippet('footer') ?>
