<?php


namespace App\Products;

use Illuminate\Database\Eloquent\Collection;

interface ProductsRepository
{
    public function search(string $query = ''): Collection;
}
