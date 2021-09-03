<?php

namespace Tests;

use Illuminate\Foundation\Mix;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate');
        // $this->withoutExceptionHandling(); //To get the actual Exception whenever it occurs instead of Laravel handing the exception.

        // Swap out the Mix manifest implementation, so we don't need
        // to run the npm commands to generate a manifest file for
        // the assets in order to run tests that return views.
        $this->swap(Mix::class, function () {
            return '';
        });
    }
}
