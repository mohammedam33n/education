<?php

namespace Tests;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\LaravelLocalization;

class TestCaseWithTransLationsSetUp extends TestCase
{
    protected function setUp() : void
    {
        parent::setUp();
        $admin = User::where('email','admin@admin.com')->first();
        
        $this->actingAs($admin);
    }

    protected function refreshApplicationWithLocale($locale)
    {
        self::tearDown();
        putenv(LaravelLocalization::ENV_ROUTE_KEY . '=' . $locale);
        self::setUp();
    }

    protected function tearDown() : void
    {
        putenv(LaravelLocalization::ENV_ROUTE_KEY);
        parent::tearDown();
    }
}