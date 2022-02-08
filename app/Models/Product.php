<?php

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property int $id
 * @property string $name
 * @property string $rate
 * @property string $months
 * @property int $category_id
 * @property int $insurance_company_id
 * @property null|Carbon $created_at
 * @property null|Carbon $updated_at
 */

class Product extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return ProductFactory::new();
    }
}
