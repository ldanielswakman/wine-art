<? $even = ($i%2 != 0) ? false : true; ?>

<section class="u-pb8vh" id="<?= $section->slug() ?>">
  <div class="row">
    <? $image_class = $even ? 'col-sm-6 last-sm col-xs-11' : 'col-sm-5'; ?>
    <? if($image = $section->cover_image()): ?>
      <div class="col-xs-10 <?= $image_class ?> u-mb1 u-minheight20 u-relative section__bg <? e($i == 1, ' section__bg--scrollable') ?>">
        <div class="section__bg-image" style="background-image: url('<?= thumb($section->image($image), ['width' => 1000])->url() ?>');"></div>
      </div>
    <? endif ?>

    <? $text_class = $even ? 'col-sm-5 col-sm-offset-1' : 'col-sm-5'; ?>
    <div class="col-xs-12 <?= $text_class ?> u-pl3 u-pb5 u-z2">
      <!-- <h4><?= $section->title() ?></h4> -->

      <?= $section->text()->kirbytext() ?>

      <? if($section->followup()->isNotEmpty()) : ?>
        <? $same_page = (0 === strpos($section->followup()->url(), '#')) ? true : false; ?>
        <a href="<?= $section->followup()->url() ?>" class="u-mt3 link<?= e($same_page, ' link--down')?>">
          <? e($section->followup_text()->isNotEmpty(), html($section->followup_text()), html($section->followup()) ) ?>
        </a>
      <? endif ?>
    </div>

  </div>
</section>