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

          <div class="grid-item col-sm-5<? e($i%2 == 0, ' col-sm-offset-1', ' u-pb6') ?><? e($i == 1, ' isExpanded'); ?>">
            <!-- Grid card -->
              <a href="#<?= $item->uid() ?>" onclick="$('.grid-item').removeClass('isExpanded'); $(this).parent().toggleClass('isExpanded'); matchHeight();" class="u-block grid-card <? e($i%2 == 0, 'u-pt6', 'u-pb9') ?>">
                <? if($image = $item->image()): ?>
                  <figure class="figure--3by2"><img src="<?= $image->url() ?>" alt="" /></figure>
                <? endif ?>
                <h3 class="u-mv1"><?= $item->title()->html() ?></h3>
                <p class="short c-grey"><?= excerpt($item->description(), 90) ?></p>
                <object><a href="#" class="link u-mt1">Read more</a></object>
              </a>

              <!-- Detail panel -->
              <div id="<?= $item->uid() ?>" class="grid-detail bg-greylightest u-pv3">
                <div class="row">
                  <div class="col-sm-8 col-sm-offset-2 u-relative">

                    <p class="c-dullblue"><?= $item->description()->kirbytext() ?></p>

                    <a class="u-pin-topright c-greylight" href="javascript:void(0)" onclick="$(this).closest('.grid-item').removeClass('isExpanded'); matchHeight();" style="font-size: 3rem;">
                      &times;
                    </a>
                  </div>
                </div>
              </div>

            <div class="grid-detail-spacer"></div>

          </div>
          
        <? $i++; endforeach ?>
      </div>

      <style>
        .isExpanded .grid-detail-spacer:before {
          content: "";
          position: absolute;
          border: 2rem solid transparent;
          border-bottom-color: #e8ebed;
          margin-top: -4rem;
        }
        .grid-detail {
          position: absolute;
          left: 0;
          display: none;
          width: 100%;
        }
        .isExpanded .grid-detail {
          display: block;
        }
      </style>


    </div>

  </div>

</main>

<? snippet('footer') ?>
