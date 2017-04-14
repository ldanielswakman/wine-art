<!-- Contact form -->
<div id="<?= $item->uid() ?>-contact" class="list-item__child list-item__contact">
  <div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 u-relative u-mt1 u-pt4 u-pb3">

      <? snippet('contact_form', ['source' => $page->title() . ' / ' . $item->title(), 'type' => 'item', 'token' => $token]); ?>

      <div class="list-item__child-arrow"></div>

      <a class="list-item__child-close u-pin-topright c-greylight" href="javascript:void(0)" style="font-size: 3rem;">&times;</a>

    </div>
  </div>
</div>
