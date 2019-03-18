<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function authenticate()
    {
        $user = factory(User::class)->make();

        // Logged in user
        $this->actingAs($user);
    }
}
