<?php

declare(strict_types=1);

namespace App\Filters\Models\Product;

use App\Filters;
use Illuminate\Database\Eloquent\Builder;
use Pricecurrent\LaravelEloquentFilters\AbstractEloquentFilter;

class MonthsMinFilter extends AbstractEloquentFilter
{
    protected $months_min;

    public function __construct($months_min)
    {
        $this->months_min = $months_min;
    }

    public function isApplicable(): bool
    {
        return $this->months_min && is_numeric($this->months_min);
    }

    public function apply(Builder $query): Builder
    {
        return $query->where('months', '>=', $this->months_min);
    }
}
