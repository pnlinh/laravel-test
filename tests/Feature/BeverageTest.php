<?php

namespace Tests\Feature;

use App\Beverage;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BeverageTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_visit_a_beverage_page_and_see_bevereages()
    {
        $beverage = factory(Beverage::class)->create();

        // User will go to url
        $response = $this->get('/beverage');

        $response->assertSee($beverage->name);

        // Assert status
        $response->assertStatus(200);
    }
}
