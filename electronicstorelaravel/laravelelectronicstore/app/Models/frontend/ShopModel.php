<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopModel extends Model
{
    use HasFactory;

    protected $table = 'shops';

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];
}