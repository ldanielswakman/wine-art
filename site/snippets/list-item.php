<div class="grid-item col-sm-5<? e($i%2 == 0, ' col-sm-offset-1 u-pb6', ' u-pb6') ?>">


  <!-- Grid card -->
  <a href="#<?= $item->uid() ?>" class="u-block grid-item__card <? e($i%2 == 0, 'u-pt4 u-pb3', 'u-pb6') ?>">
    <? if($image = $item->image()): ?>
      <figure class="figure--3by2"><img src="<?= $image->url() ?>" alt="" /></figure>
    <? endif ?>
    <h3 class="u-mv1"><?= $item->title()->html() ?></h3>
    <p class="short c-grey"><?= excerpt($item->description(), 90) ?></p>
    <object><a href="#" class="link u-mt1"><?= l::get('read_more') ?></a></object>
  </a>


  <!-- Detail panel -->
  <div id="<?= $item->uid() ?>" class="grid-item__detail bg-greylightest u-pv3">
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2 u-relative">

        <h3 class="u-mv1 c-softred"><?= $item->title()->html() ?></h3>

        <p class="c-dullblue"><?= $item->description()->kirbytext() ?></p>

        <? if($item->start_date()->isNotEmpty() && $item->end_date()->isNotEmpty()) : ?>
          <div class="row u-pv05">
            <div class="col-xs-12 col-sm-4 u-pb025 c-dullblue">
              <?= strtoupper(l::get('course_duration')) ?>
            </div>
            <div class="col-xs-12 col-sm-8 c-darkblue">
              <strong><?= $item->start_date() ?>  —  <?= $item->end_date() ?></strong>
            </div>
          </div>
        <? endif ?>

        <? if($item->fee()->isNotEmpty()) : ?>
          <div class="row u-pv05">
            <div class="col-xs-12 col-sm-4 u-pb025 c-dullblue">
              <?= strtoupper(l::get('course_fee')) ?>
            </div>
            <div class="col-xs-12 col-sm-8 c-darkblue">
              <strong><?= $item->fee() ?></strong> CHF
            </div>
          </div>
        <? endif ?>
        
        <? if($item->location()->isNotEmpty()) : ?>
          <div class="row u-pv05">
            <div class="col-xs-12 col-sm-4 u-pb025 c-dullblue">
              <?= strtoupper(l::get('course_location')) ?>
            </div>
            <div class="col-xs-12 col-sm-8 c-darkblue">
              <?= $item->location()->kirbytext() ?>
            </div>
          </div>
        <? endif ?>
        
        <? if($item->show_buy_button() == '1') : ?>
          <div class="row u-pv05 u-mt2">
            <div class="col-xs-12 col-sm-4 u-pb025">
            </div>
            <div class="col-xs-12 col-sm-8">
              <a href="#" class="link link--secondary">+ Add to cart</a>
            </div>
          </div>
        <? endif ?>

        <a class="grid-item__detail-close u-pin-topright c-greylight" href="javascript:void(0)" style="font-size: 3rem;">&times;</a>

      </div>
    </div>
  </div>


</div>