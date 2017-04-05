<?php

$ignore = array('sitemap', 'error');
$ignoreChildren = array('home');

// send the right header
header('Content-type: text/xml; charset="utf-8"');

// echo the doctype
echo '<?xml version="1.0" encoding="utf-8"?>';

?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <? foreach($pages->index() as $p): ?>
    <? if(in_array($p->uri(), $ignore) || in_array($p->parent(), $ignoreChildren)) continue ?>
    <url>
      <loc><?= html($p->url()) ?></loc>
      <lastmod><?= $p->modified('Y-m-d') ?></lastmod>
      <priority><?= ($p->isHomePage()) ? 1 : number_format(0.75/$p->depth(), 1) ?></priority>
    </url>
    <?
    // retrieve blog posts JSON to list blog posts
    if($p->template() == 'blog') :
      $curl = curl_init();
      curl_setopt_array($curl, array(
          CURLOPT_RETURNTRANSFER => 1,
          CURLOPT_URL => $p->url() . '.json',
      ));
      $json = curl_exec($curl);
      $r = json_decode($json, true);
      curl_close($curl);
      foreach ($r['data'] as $post) :
      ?>
        <url>
          <loc><?= $p->url() . '/' . $post['slug'] ?></loc>
          <lastmod><?= date("Y-m-d", strtotime($post['date'])) ?></lastmod>
          <priority>0.5</priority>
        </url>
      <? endforeach ?>
    <? endif ?>
  <? endforeach ?>
</urlset>
