<?php

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Search\Searchable;
use App\Models\InsuranceCompany;
use App\Models\Category;


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
    use Searchable;
    use HasFactory;

    protected static function newFactory()
    {
        return ProductFactory::new();
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function company()
    {
        return $this->hasOne(InsuranceCompany::class, 'id', 'insurance_company_id');
    }
}
