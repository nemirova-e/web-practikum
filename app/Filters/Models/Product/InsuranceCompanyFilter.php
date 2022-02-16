<?php

namespace App\Filters\Models\Product;

use App\Filters;
use Illuminate\Database\Eloquent\Builder;
use Pricecurrent\LaravelEloquentFilters\AbstractEloquentFilter;

class InsuranceCompanyFilter extends AbstractEloquentFilter
{
    protected $company;

    public function __construct($company)
    {
        $this->company = $company;
    }

    public function isApplicable(): bool
    {
        return $this->company && is_numeric($this->company);
    }

    public function apply(Builder $query): Builder
    {
        return $query->where('insurance_company_id', $this->company);
    }
}
