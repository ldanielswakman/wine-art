
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="author" content="L Daniel Swakman, ldaniel.eu" />
<meta http-equiv="Cache-control" content="public">

<meta name="description" content="<?= $site->description()->html() ?>">
<meta name="keywords" content="<?= $site->keywords()->html() ?>">

<!-- Social share parameters -->
<meta property="og:image" content="<?= ($site->meta_image()->isNotEmpty()) ? $site->image($site->meta_image())->url() : '' ?>" />
<meta property="og:title" content="<?= $page->title() ?>" />
<meta property="og:site_name" content="<?= $site->title() ?>" />
<meta property="og:description" content="<?= $site->description()->html() ?>" />
