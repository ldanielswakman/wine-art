<!DOCTYPE html>
<html lang="en">

  <head>

    <title><?= $site->title() ?></title>

    <?= css('assets/css/style.css') ?>

  </head>

  <body>
    <p><?= $page->text()->html() ?></p>
  </body>

</html>
