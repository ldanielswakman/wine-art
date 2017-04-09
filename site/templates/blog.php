<? snippet('header') ?>

<? $token = csrf() ?>

<main id="blog_container" data-url="<?= isset($slug) ? $page->url() . '.json?slug=' . $slug : $page->url() . '.json'; ?>">

  <section class="u-mb7">

    <div class="row u-relative">

      <div class="col-xs-12 col-sm-2">
        <? snippet('logo') ?>
      </div>

      <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-md-6 u-pt7-sm">

        <blockquote><?= $page->blog_name() ?></blockquote>

        <h4 class="c-greylight u-mt2">
          <?= isset($slug) ? '<a href="' . $page->url() . '">&larr; ' . l::get('all_articles') . '</a>' : strtoupper($page->title()); ?>
        </h4>

      </div>

    </div>

    <div id="blog_posts_results" class="u-pt3 u-pb6">
      <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-3 col-md-6">
          <div class="u-flex-row">
            <img src="<?= url('assets/images/spinner.svg') ?>" alt="" />
            <div class="u-mt15 u-ml15 u-text-15x c-greylight">
              <?= isset($slug) ? l::get('loading_article') : l::get('loading_articles'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>

</main>

<? snippet('footer', ['token' => $token]) ?>
