<?php

namespace Uniform\Tests;

class HelperTest extends TestCase
{
    public function testFunction ()
    {
        $this->assertTrue(function_exists('csrf_field'));
        $this->assertTrue(function_exists('honeypot_field'));
        $this->assertTrue(function_exists('uniform_captcha'));
        $this->assertTrue(function_exists('captcha_field'));
    }
}
