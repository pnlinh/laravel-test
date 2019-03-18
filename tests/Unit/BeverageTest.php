<?php

namespace Tests\Unit;

use App\Beverage;
use App\Exceptions\MinorCanNotBuyAlcoholicBeverageException;
use App\User;
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

    /** @test */
    public function a_minor_user_can_not_but_alcoholic_beverage(): void
    {
        $beverage = factory(Beverage::class)->make([
            'type' => 'Alcoholic',
        ]);

        $user = factory(User::class)->make([
            'age' => 17,
        ]);

        // Logged in
        $this->actingAs($user);

        // Except exception
        $this->expectException(MinorCanNotBuyAlcoholicBeverageException::class);

        // Buy beverage
        $beverage->buy();
    }
}
