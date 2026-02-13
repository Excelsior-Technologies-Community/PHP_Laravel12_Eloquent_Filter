@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col">
        <h1>Products</h1>
    </div>
    <div class="col text-end">
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
    </div>
</div>

<!-- Filter Form -->
<div class="card mb-4">
    <div class="card-header">
        <h5>Filter Products</h5>
    </div>
    <div class="card-body">
        <form method="GET" action="{{ route('products.index') }}" class="row g-3">
            <div class="col-md-3">
                <label for="search" class="form-label">Search</label>
                <input type="text" class="form-control" id="search" name="search" value="{{ $filters['search'] ?? '' }}" placeholder="Name, description, brand...">
            </div>
            
            <div class="col-md-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ (isset($filters['category']) && $filters['category'] == $category) ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-md-3">
                <label for="brand" class="form-label">Brand</label>
                <select class="form-select" id="brand" name="brand">
                    <option value="">All Brands</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand }}" {{ (isset($filters['brand']) && $filters['brand'] == $brand) ? 'selected' : '' }}>
                            {{ $brand }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-md-3">
                <label for="price_min" class="form-label">Min Price</label>
                <input type="number" class="form-control" id="price_min" name="price_min" value="{{ $filters['price_min'] ?? '' }}" placeholder="Min price" step="0.01">
            </div>
            
            <div class="col-md-3">
                <label for="price_max" class="form-label">Max Price</label>
                <input type="number" class="form-control" id="price_max" name="price_max" value="{{ $filters['price_max'] ?? '' }}" placeholder="Max price" step="0.01">
            </div>
            
            <div class="col-md-3">
                <label for="stock_min" class="form-label">Min Stock</label>
                <input type="number" class="form-control" id="stock_min" name="stock_min" value="{{ $filters['stock_min'] ?? '' }}" placeholder="Min stock">
            </div>
            
            <div class="col-md-3">
                <label for="stock_max" class="form-label">Max Stock</label>
                <input type="number" class="form-control" id="stock_max" name="stock_max" value="{{ $filters['stock_max'] ?? '' }}" placeholder="Max stock">
            </div>
            
            <div class="col-md-3">
                <label for="is_active" class="form-label">Status</label>
                <select class="form-select" id="is_active" name="is_active">
                    <option value="">All</option>
                    <option value="1" {{ (isset($filters['is_active']) && $filters['is_active'] == '1') ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ (isset($filters['is_active']) && $filters['is_active'] == '0') ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Apply Filters</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Clear Filters</a>
            </div>
        </form>
    </div>
</div>

<!-- Products Table -->
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category }}</td>
                    <td>{{ $product->brand }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        @if($product->is_active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No products found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="d-flex justify-content-center">
    {{ $products->links() }}
</div>
@endsection