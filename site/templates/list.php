<? snippet('header') ?>

<main>

  <?
  $bg_image_style = '';
  if($page->cover_image()->isNotEmpty()) {
    $bg_image_style = ' style="background-image: url(\'' . thumb($page->image($page->cover_image()), ['width' => 800])->url() . '\'); background-position: top right; background-repeat: no-repeat; background-size: contain;"';
  }
  ?>
  <section<?= $bg_image_style ?>>

  <div class="row row--internalpadding">

    <div class="col-xs-12 col-sm-2">
      <? snippet('logo') ?>
    </div>

    <div class="col-xs-12 col-sm-10 col-md-5 u-pt7-sm u-pb2">
      <?= $page->text()->kirbytext() ?>
    </div>
  </div>

  </section>

  <section id="services">

    <div class="row row--internalpadding">

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

  </section>

</main>

<? snippet('footer') ?>
