<? snippet('header') ?>

<main>

  <div class="row">

    <div class="u-pin-topleft u-">
      <? snippet('logo') ?>
    </div>

    <? if($page->cover_image()->isNotEmpty()): ?>
      <div class="col-xs-9 col-xs-offset-3 col-sm-8 col-sm-offset-4 col-md-6 col-md-offset-6" style="margin-bottom: -10rem;">
        <figure class="figure--3by2">
          <img src="<?= thumb($page->image($page->cover_image()), ['width' => 800])->url() ?>" alt="" />
        </figure>
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
