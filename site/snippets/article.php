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

    <div class="col-xs-12 col-sm-2"></div>

    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-md-6">

      <div class="u-mb8">
        <h1 class="u-text-2x u-mb1"><?= $article['title']['rendered'] ?></h1>
        <div class="u-mb4 c-greylight"><?= $article['date'] ?></div>
        <?= $article['content']['rendered'] ?>
      </div>

    </div>

  </div>

</article>
