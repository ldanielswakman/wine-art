<!-- Payment options -->
<div id="<?= $item->uid() ?>-purchase" class="list-item__child list-item__payment">
  <div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 u-relative u-mt1 u-pt4 u-pb3">

      <h2><span style="font-weight: normal;"><?= l::get('about_to_purchase') ?></span> <?= $item->title()->html() ?></h2>

      <? if($item->paypal_button_id()->isNotEmpty()) : ?>

        <p class="short c-dullblue"><?= l::get('choose_payment_method') ?>:</p>

        <div class="u-mv2">

          <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="<?= $item->paypal_button_id() ?>">
            <button type="submit" class="link" name="submit"><?= l::get('pay_w_paypal_creditcard') ?></button>
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
          </form>

          <? $msg = str_replace('PayPal', '<span style="color: #1c3687;">Pay</span><span style="color: #009edd;">Pal</span>', l::get('redirect_paypal_page')) ?>
          <small class="c-grey"><em><?= $msg ?></em></small>

        </div>

      <? endif ?>

      <div class="u-mv2">
        <a href="#<?= $item->uid() ?>-bankform" class="link link--diagonal list-item__action"><?= l::get('pay_w_bank') ?></a><br><br>
      </div>

      <div class="list-item__child-arrow"></div>

      <a class="list-item__child-close u-pin-topright c-greylight" href="javascript:void(0)" style="font-size: 3rem;">&times;</a>

    </div>

  </div>
</div>
