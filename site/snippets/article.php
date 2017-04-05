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
  'status' => '[status]',
  'date' => '[date]',
  'position'=> 0,
);
$article = (isset($article)) ? $article : $fallback;
?>

<article>

  <div class="row">

    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-3 col-md-6">

      <h1 class="u-text-2x u-mb1"><?= $article['title']['rendered'] ?></h1>
      <div class="u-mb4 c-greylight"><?= $article['date'] ?></div>
      <?= $article['content']['rendered'] ?>

    </div>

  </div>

  <div class="row">

    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-3 col-md-6 u-pb4">

      <a href="<?= $page->url() ?>" class="link"><?= l::get('read_other_posts') ?></a>

    </div>

  </div>

</article>
