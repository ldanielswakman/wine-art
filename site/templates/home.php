<? snippet('header') ?>

<? foreach ($page->children()->visible() as $section): ?>
  <section id="<?= $section->slug() ?>">
    <div class="row">

      <? if($image = $section->image()): ?>
        <div class="col-xs-10 col-sm-5 u-minheight20 u-relative" style="background-image: url('<?= $image->url() ?>');"></div>
      <? endif ?>

      <div class=" col-xs-12 col-sm-7 u-pl3">
        <h4><?= $section->title() ?></h4>

        <?= kirbytext($section->text()) ?>
      </div>

    </div>
  </section>
<? endforeach; ?>

<? snippet('footer') ?>
