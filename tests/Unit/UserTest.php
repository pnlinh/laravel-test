<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    public function test_model_configuration(): void
    {
        $m = new User();

        $this->assertEquals('id', $m->getKeyName());
        $this->assertEquals('users', $m->getTable());
        $this->assertEquals(['password', 'remember_token'], $m->getHidden());
        $this->assertEquals(['name', 'email', 'password', 'first_name', 'last_name', 'age'], $m->getFillable());
    }

    public function test_posts_relation(): void
    {
        $m = new User();

        $relation = $m->posts();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('user_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    /** @test */
    public function user_has_full_name_attribute(): void
    {
        $user = User::create([
            'name' => 'pnlinh',
            'email' => 'pnlinh1207@gmail.com',
            'age' => 24,
            'password' => '123456',
            'first_name' => 'Ngoc Linh',
            'last_name' => 'Pham',
        ]);

        $this->assertEquals('Ngoc Linh Pham', $user->full_name);
    }

    /** @test */
    public function user_has_age_attribute(): void
    {
        $user = factory(User::class)->make();

        $this->assertNotNull($user->age);
    }
}
