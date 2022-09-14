<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];


    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn ($name) => trim(strtolower($name))
        );
    }
}
