<? snippet('header') ?>

<main>

  <? snippet('logo'); ?>

  <? $i = 0; ?>
  <? foreach ($page->children()->visible() as $section): ?>

    <? $uneven = ($i%2 != 0) ? true : false; ?>

    <section class="u-pb8" id="<?= $section->slug() ?>">
      <div class="row">
        <? $image_class = $uneven ? 'col-sm-5 last-sm col-xs-offset-1 col-xs-11' : 'col-sm-5'; ?>
        <? if($image = $section->image()): ?>
          <div class="col-xs-10 <?= $image_class ?> u-mb1 u-minheight20 u-relative section__bg-image" style="background-image: url('<?= $image->url() ?>');"></div>
        <? endif ?>

        <? $text_class = $uneven ? 'col-sm-5 col-sm-offset-1' : 'col-sm-7'; ?>
        <div class="col-xs-12 <?= $text_class ?> u-pl3 u-pb6">
          <!-- <h4><?= $section->title() ?></h4> -->

          <?= $section->text()->kirbytext() ?>
        </div>

      </div>
    </section>

    <? $i++; ?>

  <? endforeach; ?>

</main>

<? snippet('footer') ?>
