<!-- Bank transfer contact form -->
<div id="<?= $item->uid() ?>-bankform" class="list-item__child list-item__bankform">
  <div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 u-relative u-mt1 u-pt4 u-pb3">

      <h2>
        <span style="font-weight: normal;"><?= l::get('bank_transfer_for') ?> </span>
        <?= $item->title()->html() ?>
      </h2>

      <div class="list-item__bankform u-pb3 u-pt2">
        <p class="u-mb1"><?= l::get('bank_form_intro_msg') ?></p>
        <? 
        snippet('contact_form', [
          'source' => $page->title() . '/ ' . $item->title() . ' (Bank transfer form)', 
          'type' => 'item', 
          'token' => $token,
          'product' => $item->title()->html(),
          'price' => $price . ' CHF',
          'success_msg' => $item->bank_success_msg()->kirbytext(),
        ]);
        ?>
      </div>

      <div class="list-item__child-arrow"></div>

      <a class="list-item__child-close u-pin-topright c-greylight" href="javascript:void(0)" style="font-size: 3rem;">&times;</a>

    </div>
  </div>
</div>
