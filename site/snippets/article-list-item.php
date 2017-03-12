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
);
$article = (isset($article)) ? $article : $fallback;
?>

<a href="<?= $page->url() . '/' . $article['slug'] ?>" class="row u-relative">

  <div class="col-xs-10 col-xs-offset-1 col-sm-2 col-sm-offset-2 col-md-1 col-md-offset-2 col-md-offset-0">
    <div class="c-greylight"><?= $article['date'] ?></div>
  </div>

  <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-md-5">

    <div class="u-mb6">
      <h3 class="u-mb1"><?= $article['title']['rendered'] ?></h3>
      <em class="c-dullblue"><?= $article['excerpt']['rendered'] ?></em>
      <object><a class="link u-mt05" href="<?= $page->url() . '/' . $article['slug'] ?>">Read all</a></object>
    </div>

  </div>

</a>
