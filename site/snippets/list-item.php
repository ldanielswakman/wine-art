
<? $price = ($item->fee()->isNotEmpty()) ? number_format($item->fee()->value(), 0, ',', '.') : 0; ?>

<div class="list-item <?= $list_options['item_size_class'] ?><? e($i%2 == 0, '') ?>">

  <!-- Grid card -->
  <a href="#<?= $item->uid() ?>" class="u-block list-item__card <? e($i%2 == 0, $list_options['item_ptop'] . ' u-pb5', 'u-pb5') ?>">
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
      <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 u-relative">

        <a href="<?= $page->slug() . '/' . $item->uid() ?>"><h3 class="u-mv1 u-mr2 c-softred"><?= $item->title()->html() ?></h3></a>

        <p class="c-dullblue"><?= $item->description()->kirbytext() ?></p>

        <? if($item->start_date()->isNotEmpty() && $item->end_date()->isNotEmpty()) : ?>
          <? snippet('list-item/list-item-detail-item', array(
            'label' => l::get('course_duration'),
            'value' => $item->date('d M Y', 'start_date') . ' — ' . $item->date('d M Y', 'end_date'),
          )) ?>
        <? endif ?>

        <? if($item->fee()->isNotEmpty()) : ?>
          <? snippet('list-item/list-item-detail-item', array(
            'label' => l::get('course_fee'),
            'value' => $price . ' CHF',
          )) ?>
        <? endif ?>
        
        <? if($item->location()->isNotEmpty()) : ?>
          <? snippet('list-item/list-item-detail-item', array(
            'label' => l::get('course_location'),
            'value' => $item->location()->kirbytext(),
          )) ?>
        <? endif ?>
        
        <div class="row row--internalpadding u-mt2">
          <div class="col-xs-12 col-sm-4 u-pt025">

            <? // Contact us button ?>
            <? if($item->contact_button()->isNotEmpty()) : ?>
              <a href="#<?= $item->uid() ?>-contact" class="link link--diagonal list-item__action u-mb05"><?= $item->contact_button() ?></a>
            <? endif ?>

          </div>
          <div class="col-xs-12 col-sm-8 u-pt025 u-pb05">

            <? // Purchase button ?>
            <? if($item->show_buy_button() == '1') : ?>
              <a href="#<?= $item->uid() ?>-purchase" class="link link--diagonal list-item__action u-mb05">Purchase</a>
            <? endif ?>

          </div>
        </div>

        <a class="list-item__detail-close u-pin-topright c-greylight" href="javascript:void(0)" style="font-size: 3rem;">&times;</a>

      </div>
    </div>

    <div class="u-mt3"></div>

    <? if($item->contact_button()->isNotEmpty()) : ?>
      <? snippet('list-item/list-item-contact', array('item' => $item, 'token' => $token)) ?>
    <? endif ?>

    <? if($item->show_buy_button() == '1') : ?>
      <? snippet('list-item/list-item-purchase', array('item' => $item, 'price' => $price)) ?>
      <? snippet('list-item/list-item-bank', array('item' => $item, 'price' => $price, 'token' => $token)) ?>
    <? endif ?>

  </div>

</div>