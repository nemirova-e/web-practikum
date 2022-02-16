<?php

namespace App\Filters\Models\Product;

use App\Filters;
use Illuminate\Database\Eloquent\Builder;
use Pricecurrent\LaravelEloquentFilters\AbstractEloquentFilter;

class MonthsMaxFilter extends AbstractEloquentFilter
{
    protected $months_max;

    public function __construct($months_max)
    {
        $this->months_max = $months_max;
    }

    public function isApplicable(): bool
    {
        return $this->months_max && is_numeric($this->months_max);
    }

    public function apply(Builder $query): Builder
    {
        return $query->where('months','<=', $this->months_max);
    }
}
