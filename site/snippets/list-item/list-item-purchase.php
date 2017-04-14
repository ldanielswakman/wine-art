<!-- Payment options -->
<div id="<?= $item->uid() ?>-purchase" class="list-item__child list-item__payment">
  <div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 u-relative u-mt1 u-pt4 u-pb3">

      <h2><span style="font-weight: normal;">You are about to purchase</span> <?= $item->title()->html() ?></h2>

      <em>
      <? if($item->start_date()->isNotEmpty() && $item->end_date()->isNotEmpty()) : ?>
        <?= $item->date('d M Y', 'start_date') ?>  —  <?= $item->date('d M Y', 'end_date') ?>
      <? endif ?>,
      <? if($item->fee()->isNotEmpty()) : ?>
        <?= $price ?> CHF
      <? endif ?>
      </em>

      <? if($item->paypal_button_id()->isNotEmpty()) : ?>
      <div class="u-mv2">
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
          <input type="hidden" name="cmd" value="_s-xclick">
          <input type="hidden" name="hosted_button_id" value="<?= $item->paypal_button_id() ?>">
          <button type="submit" class="link" name="submit">Pay with PayPal/credit card</button>
          <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>
        <small class="c-grey"><em>This will direct you to the <span style="color: #1c3687;">Pay</span><span style="color: #009edd;">Pal</span> payment page</em></small>
      </div>
      <? endif ?>

      <div class="u-mv2">
        <a href="#<?= $item->uid() ?>-bankform" class="link link--diagonal list-item__action">Pay via Bank transfer</a><br><br>
      </div>

      <div class="list-item__child-arrow"></div>

      <a class="list-item__child-close u-pin-topright c-greylight" href="javascript:void(0)" style="font-size: 3rem;">&times;</a>

    </div>

  </div>
</div>
