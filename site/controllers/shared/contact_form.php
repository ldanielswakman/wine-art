<?

use Uniform\Form;

$form = new Form([
  'email' => [
    'rules' => ['required', 'email'],
    'message' => 'Please enter a valid email address',
  ],
  'name' => [],
  'message' => [
    'rules' => ['required'],
    'message' => 'Please enter a message',
  ],
]);

if(r::is('POST')) {
  $form->emailAction([
    'to' => 'd.swakman@gmail.com',
    'from' => 'info@wine-art.co',
  ]);
}
