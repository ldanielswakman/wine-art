
<div class="list-item <?= $list_options['item_size_class'] ?><? e($i%2 == 0, '') ?>">


  <!-- Grid card -->
  <a href="#<?= $item->uid() ?>" class="u-block list-item__card u-pr3 <? e($i%2 == 0, $list_options['item_ptop'] . ' u-pb5', 'u-pb5') ?>">
    <? if($item->cover_image()->isNotEmpty()): ?>
      <? $ratio = ($item->ratio()->isNotEmpty()) ? $item->ratio()->value() : '3by2'; ?>
      <figure class="figure--<?= $ratio ?>"><img src="<?= thumb($item->image($item->cover_image()), ['width' => 600])->url() ?>" alt="" /></figure>
    <? elseif($item->symbol()->isNotEmpty()): ?>
      <div class="c-softred u-text-5x">
        <?= $item->symbol()->html() ?>
      </div>
    <? endif ?>
    <h3 class="u-mv1"><?= $item->title()->html() ?></h3>
    <p class="short c-grey"><?= str_replace('{{', '', excerpt($item->description(), $list_options['snippet_size'])) ?></p>
    <object><a href="#" class="link u-mt1"><?= l::get('read_more') ?></a></object>
  </a>


  <!-- Detail panel -->
  <div id="<?= $item->uid() ?>" class="list-item__detail bg-greylightest">
    <div class="row u-pv3">
      <div class="col-xs-12 col-sm-8 col-sm-offset-2 u-relative">

        <a href="<?= $page->slug() . '/' . $item->uid() ?>"><h3 class="u-mv1 c-softred"><?= $item->title()->html() ?></h3></a>

        <p class="c-dullblue"><?= $item->description()->kirbytext() ?></p>

        <? if($item->start_date()->isNotEmpty() && $item->end_date()->isNotEmpty()) : ?>
          <div class="row row--internalpadding u-pv025">
            <div class="col-xs-12 col-sm-4 u-pt025 c-dullblue">
              <?= strtoupper(l::get('course_duration')) ?>
            </div>
            <div class="col-xs-12 col-sm-8 u-pt025 u-pb05 c-darkblue">
              <strong><?= $item->date('d M Y', 'start_date') ?>  —  <?= $item->date('d M Y', 'end_date') ?></strong>
            </div>
          </div>
        <? endif ?>

        <? if($item->fee()->isNotEmpty()) : ?>
          <div class="row row--internalpadding u-pv025">
            <div class="col-xs-12 col-sm-4 u-pt025 c-dullblue">
              <?= strtoupper(l::get('course_fee')) ?>
            </div>
            <div class="col-xs-12 col-sm-8 u-pt025 u-pb05 c-darkblue">
              <strong><?= number_format($item->fee()->value(), 0, ',', '.') ?></strong> CHF
            </div>
          </div>
        <? endif ?>
        
        <? if($item->location()->isNotEmpty()) : ?>
          <div class="row row--internalpadding u-pv025">
            <div class="col-xs-12 col-sm-4 u-pt025 c-dullblue">
              <?= strtoupper(l::get('course_location')) ?>
            </div>
            <div class="col-xs-12 col-sm-8 u-pt025 u-pb05 c-darkblue short">
              <?= $item->location()->kirbytext() ?>
            </div>
          </div>
        <? endif ?>
        
        <div class="row row--internalpadding u-mt2">
          <div class="col-xs-12 col-sm-4 u-pt025">

            <? // Contact us button ?>
            <? if($item->contact_button()->isNotEmpty()) : ?>
              <a href="#item__contact" class="link link--diagonal"><?= $item->contact_button() ?></a>
            <? endif ?>

          </div>
          <div class="col-xs-12 col-sm-8 u-pt025 u-pb05">

            <? // Purchase button ?>
            <? if($item->show_buy_button() == '1') : ?>
              <a href="#item__payment" class="link link--diagonal">Purchase</a>
            <? endif ?>

          </div>
        </div>

        <a class="list-item__detail-close u-pin-topright c-greylight" href="javascript:void(0)" style="font-size: 3rem;">&times;</a>

      </div>
    </div>

    <div class="u-mt3"></div>

    <!-- Contact form -->
    <? if($item->contact_button()->isNotEmpty()) : ?>
      <div class="list-item__contact">
        <div class="row">
          <div class="col-xs-12 col-sm-8 col-sm-offset-2 u-relative u-pt3 u-pb2">
            <div class="list-item__contact-arrow"></div>
            <? snippet('contact_form', ['source' => $page->title() . ': ' . $item->title(), 'type' => 'item', 'token' => $token]); ?>
          </div>
        </div>
      </div>
    <? endif ?>

    <!-- Purchase form -->
    <? if($item->show_buy_button() == '1') : ?>
      <div class="list-item__payment">
        <div class="row">
          <div class="col-xs-12 col-sm-8 col-sm-offset-2 u-relative u-pt3 u-pb2">

            <h2><span style="font-weight: normal;">You are about to purchase</span> <?= $item->title()->html() ?></h2>

            <em>
            <? if($item->start_date()->isNotEmpty() && $item->end_date()->isNotEmpty()) : ?>
              <?= $item->date('d M Y', 'start_date') ?>  —  <?= $item->date('d M Y', 'end_date') ?>
            <? endif ?>,
            <? if($item->fee()->isNotEmpty()) : ?>
              <?= number_format($item->fee()->value(), 0, ',', '.') ?> CHF
            <? endif ?>
            </em>

            <div class="u-mv2">
              <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="hosted_button_id" value="394UA5Q9CV3LS">
                <button type="submit" class="link" name="submit">Pay with PayPal/credit card</button>
                <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
              </form>
              <small class="c-grey"><em>This will direct you to the <span style="color: #1c3687;">Pay</span><span style="color: #009edd;">Pal</span> payment page</em></small>
            </div>

            <div class="u-mv2">
              <a href="#item__bankform" class="link">Pay via Bank transfer</a><br><br>
            </div>

            <div class="list-item__bankform u-pb3 u-hide">
              <p>Please fill out your name and email address here, and you will receive the bank account information.</p>
              <? snippet('contact_form', ['source' => $page->title() . ': ' . $item->title(), 'type' => 'item', 'token' => $token]); ?>
            </div>

            <div class="list-item__payment-arrow"></div>
          </div>
        </div>
      </div>
    <? endif ?>

  </div>

</div>