<?php


namespace App\Products;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

class EloquentRepository implements ProductsRepository
{
    public function search(string $query = ''): Builder
    {
        return Product::query()
            ->where('name', 'like', "%{$query}%");
    }
}
