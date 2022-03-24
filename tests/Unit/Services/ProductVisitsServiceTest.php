<?php

namespace Tests\Unit\Services;

use App\Services\ProductVisitsService;
use Illuminate\Support\Facades\Cache;
use PHPUnit\Framework\TestCase;

class ProductVisitsServiceTest extends TestCase
{
    public function test_getVisitsFromExistsProduct()
    {
        $productId = 23234;
        Cache::shouldReceive('get')
            ->once()
            ->withArgs(fn($key) => $key === 'visits' . $productId)
            ->andReturn(203);

        $visits = ProductVisitsService::get($productId);

        $this->assertEquals(203, $visits);
    }

    public function test_getVisitsFromNotExistsProduct()
    {
        $productId = 23234;
        Cache::shouldReceive('get')
            ->once()
            ->withArgs(fn($key) => $key === 'visits' . $productId)
            ->andReturn(0);

        $visits = ProductVisitsService::get($productId);

        $this->assertEquals(0, $visits);
    }
}
