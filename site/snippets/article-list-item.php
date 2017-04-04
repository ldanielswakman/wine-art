<?
$fallback = array(
  'id' => 0,
  'title' => array(
    'rendered' => '[title]'
  ),
  'slug' => '[slug]',
  'link' => '[link]',
  'excerpt' => array(
    'rendered' => '[excerpt]'
  ),
  'feature_img_url' => null,
  'status' => '[status]',
  'date' => '[date]',
  'position'=> 0,
);
$article = (isset($article)) ? $article : $fallback;
$even = ($position%2 != 0) ? false : true;
?>

<a href="<?= $page->url() . '/' . $article['slug'] ?>" class="row u-relative" data-slug="<?= $article['slug'] ?>">

  <div class="col-xs-8 col-sm-3 u-pb2 <?= ($even) ? 'last-sm col-xs-offset-4 col-sm-offset-1" style="padding-right: 0;' : 'u-pr3" style="padding-left: 0;'; ?>">
    <div class="c-greylight"><? //$article['date'] ?></div>
    <? if($article['feature_media_url'] !== null) : ?>
      <figure><img src="" data-url="<?= $article['feature_media_url'] ?>" alt="<?= $article['title']['rendered'] ?>" class="article-featured-image u-hide" /></figure>
    <? endif ?>
  </div>

  <div class="col-xs-10 col-sm-5 <?= ($even) ? 'col-sm-offset-3' : ''; ?>">

    <div class="u-mb8">
      <h3 class="u-mb05"><?= $article['title']['rendered'] ?></h3>
      <div class="u-mb1 c-greylight"><?= $article['date'] ?></div>
      <em class="c-dullblue"><?= $article['excerpt']['rendered'] ?></em>
      <object><a class="link u-mt05" href="<?= $page->url() . '/' . $article['slug'] ?>">Read all</a></object>
    </div>

  </div>

</a>
