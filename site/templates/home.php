<? snippet('header') ?>

<main>

  <? snippet('logo'); ?>

  <? $i = 0; ?>
  <? foreach ($page->children()->visible() as $section): ?>

    <? $even = ($i%2 != 0) ? false : true; ?>

    <section class="u-pb8" id="<?= $section->slug() ?>">
      <div class="row">
        <? $image_class = $even ? 'col-sm-5 last-sm col-xs-11' : 'col-sm-5'; ?>
        <? if($image = $section->image()): ?>
          <div class="col-xs-10 <?= $image_class ?> u-mb1 u-minheight20 u-relative section__bg">
            <div class="section__bg-image" style="background-image: url('<?= $image->url() ?>');"></div>
          </div>
        <? endif ?>

        <? $text_class = $even ? 'col-sm-5 col-sm-offset-2' : 'col-sm-5'; ?>
        <div class="col-xs-12 <?= $text_class ?> u-pl3 u-pb6">
          <!-- <h4><?= $section->title() ?></h4> -->

          <?= $section->text()->kirbytext() ?>

          <? if($section->followup()->isNotEmpty()) : ?>
            <? $page_exists = ($section->followup()->url()) ? false : true; ?>
            <a href="<?= $section->followup()->url() ?>" class="u-mt3 link<?= e($page_exists, ' link--secondary')?>">
              <? e($section->followup_text()->isNotEmpty(), html($section->followup_text()), html($section->followup()) ) ?>
            </a>
          <? endif ?>
        </div>

      </div>
    </section>

    <? $i++; ?>

  <? endforeach; ?>

</main>

<? snippet('footer') ?>
