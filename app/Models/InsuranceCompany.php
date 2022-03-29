<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property null|Carbon $created_at
 * @property null|Carbon $updated_at
 */

class InsuranceCompany extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'insurance_company_id', 'id');
    }
}
