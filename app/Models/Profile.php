<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public const DEFAULT_TYPE = 'user';

    protected $fillable = [
        'user_id',
        'type',
        'address',
        'city',
        'phone',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];

    public static function empty(): array
    {
        return [
            "user_id" => 0,
            "type" => self::DEFAULT_TYPE,
            "address" => "",
            "city" => "",
            "phone" => "",
        ];
    }
}


