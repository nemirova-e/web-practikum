<?php

namespace App\Filters\Models\Product;

use App\Filters;
use Illuminate\Database\Eloquent\Builder;
use Pricecurrent\LaravelEloquentFilters\AbstractEloquentFilter;

class RateMinFilter extends AbstractEloquentFilter
{
    protected $rate_min;

    public function __construct($rate_min)
    {
        $this->rate_min = $rate_min;
    }

    public function isApplicable(): bool
    {
        return $this->rate_min && is_numeric($this->rate_min);
    }

    public function apply(Builder $query): Builder
    {
        return $query->where('rate', '>=', $this->rate_min);
    }
}
