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
$even = ($position%2 != 0) ? false : true;
?>

<a href="<?= $page->url() . '/' . $article['slug'] ?>" class="row u-relative" data-slug="<?= $article['slug'] ?>">

  <div class="<?= ($even == false) ? 'u-pin-topleft' : 'u-pin-topright' ?>">
    <img src="http://dionysianimpulse.net/wp-content/uploads/2017/02/a.jpeg" alt=""  style="width: 20vw;" />
  </div>

  <div class="col-xs-10 col-xs-offset-1 col-sm-2 col-sm-offset-2 col-md-1 col-md-offset-1 col-md-offset-0">
    <div class="c-greylight"><? //$article['date'] ?></div>
  </div>

  <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-md-5">

    <div class="u-mb8">
      <h3 class="u-mb05"><?= $article['title']['rendered'] ?></h3>
      <div class="u-mb1 c-greylight"><?= $article['date'] ?></div>
      <em class="c-dullblue"><?= $article['excerpt']['rendered'] ?></em>
      <object><a class="link u-mt05" href="<?= $page->url() . '/' . $article['slug'] ?>">Read all</a></object>
    </div>

  </div>

</a>
