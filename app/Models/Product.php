<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $rate
 * @property string $months
 * @property null|Carbon $created_at
 * @property null|Carbon $updated_at
 */

class Product extends Model
{
    use HasFactory;
}
