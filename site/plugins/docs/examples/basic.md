# Basic Example

This is an example for a very basic form that asks the user to enter an email address, a message and an optional name. It uses the [HoneypotGuard](/guards/honeypot) for spam protection and sends the form data in an email to the owner of the site (`me@example.com`). Error or success messages are displayed below the form. If there is an error for a specific form field the field gets an `error` class.

## Controller

```php
<?php

use Uniform\Form;

return function ($site, $pages, $page) {

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

    if (r::is('POST')) {
        $form->emailAction([
            'to' => 'me@example.com',
            'from' => 'info@example.com',
        ]);
    }

    return compact('form');
};
```

## Template

```html+php
<?php snippet('header') ?>

<h1><?php echo $page->title()->html() ?></h1>

<style type="text/css">
    label, input, textarea {
        display: block;
    }
    .uniform__potty {
        position: absolute;
        left: -9999px;
    }
    .error {
        border: 1px solid red;
    }
</style>

<form action="<?php echo $page->url() ?>" method="POST">
    <label>Email</label>
    <input<?php if ($form->error('email')): ?> class="error"<?php endif; ?> name="email" type="email" value="<?php echo $form->old('email') ?>">

    <label>Name</label>
    <input<?php if ($form->error('name')): ?> class="error"<?php endif; ?> name="name" type="text" value="<?php echo $form->old('name') ?>">

    <label>Message</label>
    <textarea<?php if ($form->error('message')): ?> class="error"<?php endif; ?> name="message"><?php echo $form->old('message') ?></textarea>

    <?php echo csrf_field() ?>
    <?php echo honeypot_field() ?>
    <input type="submit" value="Submit">
</form>
<?php if ($form->success()): ?>
    Thank you for your message. We will get back to you soon!
<?php else: ?>
    <?php snippet('uniform/errors', ['form' => $form]) ?>
<?php endif; ?>

<?php snippet('footer') ?>

```