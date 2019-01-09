<?php

namespace Tests\Unit;

use App\Post;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    public function test_model_configuration(): void
    {
        $m = new Post();

        $this->assertEquals('id', $m->getKeyName());
        $this->assertEquals('posts', $m->getTable());
        $this->assertEquals(['title', 'slug', 'content'], $m->getFillable());
    }

    public function test_user_relation(): void
    {
        $m = new Post();

        $relation = $m->user();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('user_id', $relation->getForeignKey());
        $this->assertEquals('id', $relation->getOwnerKey());
    }
}
