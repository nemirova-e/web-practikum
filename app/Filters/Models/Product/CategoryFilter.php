<?php

namespace App\Filters\Models\Product;

use Illuminate\Database\Eloquent\Builder;
use Pricecurrent\LaravelEloquentFilters\AbstractEloquentFilter;

class CategoryFilter extends AbstractEloquentFilter
{
    protected $category;

    public function __construct($category)
    {
        $this->category = $category;
    }

    public function isApplicable(): bool
    {
        return $this->category && is_numeric($this->category);
    }

    public function apply(Builder $query): Builder
    {
        return $query->where('category_id', $this->category);
    }
}
