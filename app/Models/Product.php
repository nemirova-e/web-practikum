<?php

declare(strict_types=1);

namespace App\Models;

use App\Services\ProductVisitsService;
use Carbon\Carbon;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Search\Searchable;
use Pricecurrent\LaravelEloquentFilters\Filterable;
use Illuminate\Support\Facades\Cache;

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
    use Filterable;


    protected $fillable = ['name', 'rate', 'months','category_id'];

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

    public function visits()
    {
//        $product_id = $this ->id;
//        return Cache::get('visits'.$product_id, 0);
        return ProductVisitsService::get($this->id);
    }

    public function responses()
    {
        return $this->hasMany(UserResponse::class, 'product_id', 'id');
    }
}
