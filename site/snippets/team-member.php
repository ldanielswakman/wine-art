<? $even = ($i%2 != 0) ? false : true; ?>

<div class="row u-mv8">

  <? if($even === false): ?>
    <div class="col-xs-5 u-sm-show">&nbsp;</div>
  <? endif ?>

  <?
  $image_class = 'col-xs-7 col-sm-4 col-md-3 col-md-offset-1 last-sm u-mb2';
  if ($even === true) { $image_class = 'col-xs-7 col-sm-4 col-md-3 u-mb2'; }
  ?>
  <div class="<?= $image_class ?> u-ph0 section__blur-in-image">
    <? if($image = $member->photo()): ?>
      <figure><img src="<?= thumb($page->image($image), ['width' => 600, 'height' => 600, 'crop' => true])->url() ?>" alt=""></figure>
    <? endif ?>
  </div>

  <?
  $text_class = 'col-xs-10 col-xs-offset-1 col-sm-7 col-sm-offset-1 col-md-6 col-md-offset-2';
  if ($even === true) { $text_class = 'col-xs-10 col-xs-offset-1 col-sm-7 col-md-6 col-md-offset-1'; }
  ?>
  <div class="<?= $text_class ?>">

    <h2 class="c-softred u-text-2x"><?= $member->name()->html() ?></h2>
    <h3><em><?= $member->role()->html() ?></em></h3>

    <?= $member->descr()->kirbytext() ?>

    <p class="short"><a href="#more" class="link link--down u-text-sans"><?= l::get('more') ?></a></p>

    <div class="more">
      <?= $member->descr_ext()->kirbytext() ?>
      <p class="short"> <a href="#less" class="link link--up u-text-sans"><?= l::get('less') ?></a></p>
    </div>

  </div>

</div>
