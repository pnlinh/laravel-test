<?php

namespace Tests\Feature;

use App\Http\Controllers\CalculateController;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CalculateControllerTest extends TestCase
{
    /** @var \App\Http\Controllers\CalculateController */
    private $calculator;

    public function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->calculator = new CalculateController();
    }

    /** test */
    public function test_add_two_numbers()
    {
        $testValue = [
            [1, 1, 2],
            [2, 2, 4],
            [4, 1, 5],
        ];

        foreach ($testValue as $value) {
            print_r(sprintf("\na: %d, b: %d, ex: %d\n", $value[0], $value[1], $value[2]));
            $result = $this->calculator->plus($value[0], $value[1]);
            $this->assertSame((int) $value[2], $result);
        }
    }

    /** test */
    public function test_minus_two_numbers()
    {
        $testValue = [
            [1, 1, 0],
            [2, 5, -3],
            [4, 1, 3],
        ];

        foreach ($testValue as $value) {
            print_r(sprintf("\na: %d, b: %d, ex: %d\n", $value[0], $value[1], $value[2]));
            $result = $this->calculator->minus($value[0], $value[1]);
            $this->assertSame((int) $value[2], $result);
        }
    }
}
