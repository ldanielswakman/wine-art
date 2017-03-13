<?php

// setting correct language (for outputting date)
setlocale(LC_ALL, $site->language()->locale());

// retrieve Blog content from Wordpress API
$url = 'http://dionysianimpulse.net/wp-json/wp/v2/posts';
$json_data = file_get_contents($url);
$data = json_decode($json_data, true);

// prepare json array
$json = array();
$json['data'] = array();

// build array result data
foreach($data as $key => $article) {

  $article['date'] = strftime('%e %h %Y', strtotime($article['date']));

  // only show articles that are published
  if($article['status'] == 'publish') {

    // add data to json array
    $json['data'][] = array(
      'id'      => (integer)$article['id'],
      'title'   => (string)$article['title']['rendered'],
      'slug'    => (string)$article['slug'],
      'link'    => (string)$article['link'],
      'excerpt' => (string)$article['excerpt']['rendered'],
      'date'    => (string)$article['date'], // only output date, not time
      'position'=> (integer)$key,
      'html'    => snippet('article-list-item', array('article' => $article, 'position' => $key), true)
    );

  }

}

echo json_encode($json);
