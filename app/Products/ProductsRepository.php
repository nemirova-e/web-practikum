<?php


namespace App\Products;

use Illuminate\Database\Eloquent\Builder;

interface ProductsRepository
{
    public function search(string $query = ''): Builder;
}
