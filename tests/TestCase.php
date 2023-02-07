<?php

namespace W360\Support\Tests;

use Orchestra\Testbench\TestCase as TestBase;
use W360\Support\SupportServiceProvider;

class TestCase extends TestBase {

    public function setUp(): void
    {
        parent::setUp();
        $this->withoutVite();
    }

    protected function getPackageProviders($app)
    {
        return [
            SupportServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup
    }


}