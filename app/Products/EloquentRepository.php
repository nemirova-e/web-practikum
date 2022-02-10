<?php


namespace App\Products;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class EloquentRepository implements ProductsRepository
{
    public function search(string $query = ''): Collection
    {
        return Product::query()
            ->where('name', 'like', "%{$query}%")
            ->get();
    }
}
