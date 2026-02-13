<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

class Product extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'category',
        'brand',
        'is_active'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function modelFilter()
    {
        return $this->provideFilter(\App\ModelFilters\ProductFilter::class);
    }
}