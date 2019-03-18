<?php

namespace Tests\Feature;

use App\Beverage;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class BeverageTest extends TestCase
{
    use DatabaseMigrations;

    protected $beverage;

    protected function setUp(): void
    {
        parent::setUp();
        $this->beverage = factory(Beverage::class)->create();
    }

    /** @test */
    public function a_user_can_visit_a_beverage_page_and_see_bevereages(): void
    {
        // User will go to url
        $response = $this->get('/beverage');

        $response->assertSee($this->beverage->name);

        // Assert status
        $response->assertStatus(200);
    }
    
    /** @test */
    public function a_user_can_visit_a_beverage_page(): void
    {
        $response = $this->get('/beverage/'.$this->beverage->id);

        $response->assertStatus(200);
    }
    
    /** @test */
    public function a_logged_in_user_can_buy_beverage(): void
    {
        
    }
}
