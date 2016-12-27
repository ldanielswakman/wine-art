<? snippet('header') ?>

<main>

  <div class="row">

    <div class="col-xs-12 col-sm-2">

      <? snippet('logo') ?>

    </div>

    <div class="col-sm-8 u-pv6">

      <?= $page->text()->kirbytext() ?>

      <div class="row row--internalpadding u-mt6">
        <? $i = 1; foreach ($page->children()->visible() as $item) : ?>

          <div class="grid-item col-sm-5<? e($i%2 == 0, ' col-sm-offset-1 u-pb6', ' u-pb6') ?>">
            <!-- Grid card -->
              <a href="#<?= $item->uid() ?>" class="u-block grid-item__card <? e($i%2 == 0, 'u-pt4 u-pb3', 'u-pb6') ?>">
                <? if($image = $item->image()): ?>
                  <figure class="figure--3by2"><img src="<?= $image->url() ?>" alt="" /></figure>
                <? endif ?>
                <h3 class="u-mv1"><?= $item->title()->html() ?></h3>
                <p class="short c-grey"><?= excerpt($item->description(), 90) ?></p>
                <object><a href="#" class="link u-mt1">Read more</a></object>
              </a>

              <!-- Detail panel -->
              <div id="<?= $item->uid() ?>" class="grid-item__detail bg-greylightest u-pv3">
                <div class="row">
                  <div class="col-sm-8 col-sm-offset-2 u-relative">

                    <p class="c-dullblue"><?= $item->description()->kirbytext() ?></p>

                    <a class="grid-item__detail-close u-pin-topright c-greylight" href="javascript:void(0)" style="font-size: 3rem;">&times;</a>

                  </div>
                </div>
              </div>

          </div>
          
        <? $i++; endforeach ?>
      </div>

    </div>

  </div>

</main>

<? snippet('footer') ?>
