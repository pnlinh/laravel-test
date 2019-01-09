<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /** test */
    public function test_model_configuration()
    {
        $m = new User();

        $this->assertEquals('id', $m->getKeyName());
        $this->assertEquals('users', $m->getTable());
        $this->assertEquals(['password', 'remember_token'], $m->getHidden());
        $this->assertEquals(['name', 'email', 'password'], $m->getFillable());
    }
}
