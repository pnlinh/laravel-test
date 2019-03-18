<?php

namespace Tests\Unit;

use App\Beverage;
use Tests\TestCase;

class BeverageTest extends TestCase
{
    protected $beverage;

    public function setUp(): void
    {
        parent::setUp();
        $this->beverage = factory(Beverage::class)->make();
    }

    /** @test */
    public function beverage_has_name(): void
    {
        $name = $this->beverage->name;

        $this->assertNotEmpty($name);
    }

    /** @test */
    public function beverage_has_type(): void
    {
        $type = $this->beverage->type;

        $this->assertNotEmpty($type);
    }
}
