<?php

namespace App\Models;

use Carbon\Carbon;
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
}
