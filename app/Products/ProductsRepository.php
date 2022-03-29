<?php

declare(strict_types=1);

namespace App\Products;

use Illuminate\Database\Eloquent\Builder;

interface ProductsRepository
{
    public function search(string $query = ''): Builder;
}
