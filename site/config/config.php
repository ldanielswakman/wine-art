<?php

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/

// Language settings
c::set('languages', array(
  array(
    'code' => 'en',
    'name' => 'English',
    'default' => true,
    'locale' => 'en_US.UTF-8',
    'url' => '/',
  ),
  array(
    'code' => 'de',
    'name' => 'Deutsch',
    'locale' => 'de_DE.UTF-8',
    'url' => '/de',
  ),
));


/*

---------------------------------------
Routes
---------------------------------------

Contact form Routing

*/
c::set('routes', [
  [
    'pattern' => 'contactform_post',
    'method' => 'POST',
    'action'  => function() {
      
      // Set detected language
      site()->visit('home', get('language'));
      site()->kirby->localize();

      $form = new \Uniform\Form([
        'email' => [
          'rules' => ['required', 'email'],
          'message' => l::get('form_email_error'),
        ],
        'name' => [],
        'message' => [
          'rules' => ['required'],
          'message' => 'Please enter a message',
        ],
        'language' => [],
        'source' => [],
        'product' => [],
        'price' => [],
      ]);

      // Perform validation and execute guards.
      $form->withoutFlashing()
        ->withoutRedirect()
        ->guard();

      $code = 200;

      if (!$form->success()) { 

        $code = 400;

      } else {

        // Determine if form is a bank transfer request
        $is_transfer = (strpos($form->data('source'), 'Bank transfer') !== false) ? true : false;

        // Set subject
        $subject = ($is_transfer === true) ? 'New purchase (bank transfer)' : 'Contact request';

        // If validation and guards passed, execute the action.
        $form->emailAction([
          'to' => 'info@wine-art.co',
          'from' => 'contactform@wine-art.co',
          'replyTo' => 'info@wine-art.co',
          'subject' => '[wine-art.co] ' . $subject,
          'snippet' => 'email-contact-request'
        ])
        ->logAction([
          'file' => kirby()->roots()->site() . '/email.log',
        ]);

        // send a control email to admin
        $form->emailAction([
          'to' => 'hello@ldaniel.eu',
          'from' => 'contactform@wine-art.co',
          'replyTo' => 'info@wine-art.co',
          'subject' => '[wine-art.co] ' . $subject . ' (Admin copy)',
          'snippet' => 'email-contact-request'
        ])

        if ($is_transfer === true) {
          // Send email with bank transfer info to customer
          $form->emailAction([
            'to' => $form->data('email'),
            'from' => 'info@wine-art.co',
            'subject' => '[wine-art.co] Bank transfer info for your purchase',
            'snippet' => 'email-bank-transfer'
          ]);
        }

        if (!$form->success()) { $code = 500; }

      }

      // Return code 200 on success.
      return response::json(['success' => $form->success(), 'errors' => $form->errors(), 'code' => $code]);
    }
  ],
  [
    'pattern' => 'blog/(:any)',
    'action'  => function($uid) {
      // activate the page and set the language
      site()->visit('blog', 'en');
      return array('blog', array('slug' => $uid));
    }
  ],
  [
    'pattern' => 'de/blog/(:any)',
    'action'  => function($uid) {
      // activate the page and set the language
      site()->visit('blog', 'de');
      return array('blog', array('slug' => $uid));
    }
  ]
]);

