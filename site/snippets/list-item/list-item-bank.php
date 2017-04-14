<!-- Bank transfer contact form -->
<div id="<?= $item->uid() ?>-bankform" class="list-item__child list-item__bankform">
  <div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 u-relative u-mt1 u-pt4 u-pb3">

      <h2><span style="font-weight: normal;">Bank transfer for </span> <?= $item->title()->html() ?></h2>

      <em>
      <? if($item->start_date()->isNotEmpty() && $item->end_date()->isNotEmpty()) : ?>
        <?= $item->date('d M Y', 'start_date') ?>  —  <?= $item->date('d M Y', 'end_date') ?>
      <? endif ?>,
      <? if($item->fee()->isNotEmpty()) : ?>
        <?= $price ?> CHF
      <? endif ?>
      </em>

      <div class="list-item__bankform u-pb3 u-pt2">
        <p class="u-mb1">Please fill out your name and email address here, and you will receive the bank account information.</p>
        <? 
        snippet('contact_form', [
          'source' => $page->title() . '/ ' . $item->title() . ' (Bank transfer form)', 
          'type' => 'item', 
          'token' => $token,
          'product' => $item->title()->html(),
          'price' => $price . ' CHF',
          'success_msg' => '<div class="short">' . $item->bank_success_msg()->kirbytext() . '</div>'
        ]);
        ?>
      </div>

      <div class="list-item__child-arrow"></div>

      <a class="list-item__child-close u-pin-topright c-greylight" href="javascript:void(0)" style="font-size: 3rem;">&times;</a>

    </div>
  </div>
</div>
