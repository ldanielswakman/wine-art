<?

return function($site, $pages, $page) {

  require_once(kirby()->roots()->controllers() . '/shared/contact_form.php');

  return compact('form');

};
