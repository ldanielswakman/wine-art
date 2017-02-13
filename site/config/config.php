<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

c::set('license', 'put your license key here');

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

// Caching
// NB: set this to true before launching site
c::set('cache', false);


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
      site()->visit('home', get('lang'));
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
      ]);

      // Perform validation and execute guards.
      $form->withoutFlashing()
        ->withoutRedirect()
        ->guard();

      $code = 200;

      if (!$form->success()) { 

        $code = 400;

      } else {

        // If validation and guards passed, execute the action.
        $form->emailAction([
          'to' => 'd.swakman@gmail.com',
          'from' => 'contactform@wine-art.co',
        ]);

        if (!$form->success()) { $code = 500; }

      }

      // Return code 200 on success.
      return response::json(['success' => $form->success(), 'errors' => $form->errors(), 'code' => $code]);
    }
  ]
]);

