<?php

declare(strict_types=1);

namespace App\Filters\Models\Product;

use App\Filters;
use Illuminate\Database\Eloquent\Builder;
use Pricecurrent\LaravelEloquentFilters\AbstractEloquentFilter;

class RateMaxFilter extends AbstractEloquentFilter
{
    protected ?int $rate_max = null;

    public function __construct(?int $rate_max)
    {
        $this->rate_max = $rate_max;
    }

    public function isApplicable(): bool
    {
        return $this->rate_max && is_numeric($this->rate_max);
    }

    public function apply(Builder $query): Builder
    {
        return $query->where('rate', '<=', $this->rate_max);
    }
}
