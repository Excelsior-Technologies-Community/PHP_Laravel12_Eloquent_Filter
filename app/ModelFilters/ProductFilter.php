<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ProductFilter extends ModelFilter
{
    public function name($name)
    {
        return $this->where('name', 'LIKE', "%$name%");
    }

    public function priceMin($price)
    {
        return $this->where('price', '>=', $price);
    }

    public function priceMax($price)
    {
        return $this->where('price', '<=', $price);
    }

    public function category($category)
    {
        return $this->where('category', $category);
    }

    public function brand($brand)
    {
        return $this->where('brand', $brand);
    }

    public function stockMin($stock)
    {
        return $this->where('stock', '>=', $stock);
    }

    public function stockMax($stock)
    {
        return $this->where('stock', '<=', $stock);
    }

    public function isActive($isActive)
    {
        return $this->where('is_active', $isActive);
    }

    public function search($search)
    {
        return $this->where(function($query) use ($search) {
            return $query->where('name', 'LIKE', "%$search%")
                         ->orWhere('description', 'LIKE', "%$search%")
                         ->orWhere('brand', 'LIKE', "%$search%");
        });
    }

    public function setup()
    {
        // Add any setup logic here
    }
}