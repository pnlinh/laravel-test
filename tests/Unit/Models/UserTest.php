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

    /** test */
    public function test_contains_hidden_valid_properties()
    {
        $m = new User();

        $this->assertEquals(['password', 'remember_token'], $m->getHidden());
    }

    public function test_valid_table_name()
    {
        $m = new User();

        $this->assertEquals('users', $m->getTable());
    }

    public function test_valid_primary_key()
    {
        $m = new User();

        $this->assertEquals('id', $m->getKeyName());
    }
}
