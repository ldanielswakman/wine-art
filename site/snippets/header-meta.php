<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="author" content="L Daniel Swakman, ldaniel.eu" />
<meta http-equiv="Cache-control" content="public">

<meta name="description" content="<?= $description ?>">
<meta name="keywords" content="<?= $site->keywords()->html() ?>">

<!-- Social share parameters -->
<meta property="og:image" content="<?= (isset($meta_image)) ? $meta_image : $meta_image_url; ?>" />
<meta property="og:title" content="<?= $page->title() ?>" />
<meta property="og:site_name" content="<?= $site->title() ?>" />
<meta property="og:description" content="<?= $description ?>" />
