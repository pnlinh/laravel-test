<?php

namespace Tests\Unit\Models;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /** test */
    public function test_contains_valid_fillable_properties()
    {
        $m = new User();

        $this->assertEquals(['name', 'email', 'password'], $m->getFillable());
    }
}
