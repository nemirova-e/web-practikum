<?php

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\UserResponseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $patronymic
 * @property string $email
 * @property string $phone
 * @property string $message
 * @property null|Carbon $created_at
 * @property null|Carbon $updated_at
 */

class UserResponse extends Model
{
    use HasFactory;

    protected $fillable = ['firstname', 'lastname', 'patronymic', 'phone', 'email', 'message'];

    protected static function newFactory()
    {
        return UserResponseFactory::new();
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }


}
