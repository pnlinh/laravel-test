<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    public function test_model_configuration(): void
    {
        $m = new User();

        $this->assertEquals('id', $m->getKeyName());
        $this->assertEquals('users', $m->getTable());
        $this->assertEquals(['password', 'remember_token'], $m->getHidden());
        $this->assertEquals(['name', 'email', 'password'], $m->getFillable());
    }

    public function test_posts_relation(): void
    {
        $m = new User();

        $relation = $m->posts();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('user_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }
}
