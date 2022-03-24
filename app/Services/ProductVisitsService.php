<?php


namespace App\Services;

use Illuminate\Support\Facades\Cache;

class ProductVisitsService
{
    public static function increment(int $productId): int
    {
        Cache::rememberForever(self::getCacheKey($productId), function () {
            return 0;
        });

        return Cache::increment(self::getCacheKey($productId));
    }

    public static function get(int $productId): int
    {
        return Cache::get(self::getCacheKey($productId), 0);
    }

    private static function getCacheKey(int $productId): string
    {
        return 'visits' . $productId;
    }
}
