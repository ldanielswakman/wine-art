<? snippet('header') ?>

<? $token = csrf() ?>

<main>

  <section>

    <div class="row u-relative u-mb7">

      <div class="col-xs-12 col-sm-2">
        <? snippet('logo') ?>
      </div>

      <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-md-6 u-pt7-sm">

        <h1 class="c-greylight u-mb3"><?= $page->title()->html() ?></h1>
        <?= $page->text()->kirbytext() ?>

      </div>
    </div>

  </section>

  <section>

    <?
    // Team members
    $i = 0;
    ?>
    <? foreach ($page->team_members()->toStructure() as $member) : ?>

      <? snippet('team-member', array('member' => $member, 'i' => $i)) ?>
      <? $i++; ?>

    <? endforeach; ?>

  </section>

  <section class="u-pb6">

    <div class="row u-relative">
      <div class="col-xs-10 col-xs-offset-1 col-sm-7 col-sm-offset-2 col-md-6 col-md-offset-3">

        <?= $page->text_after()->kirbytext() ?>

      </div>
    </div>

  </section>

</main>

<? snippet('footer', ['token' => $token]) ?>
