@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col">
        <h1>Product Details</h1>
    </div>
    <div class="col text-end">
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit</a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5>{{ $product->name }}</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th style="width: 200px;">ID</th>
                <td>{{ $product->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $product->description ?? 'No description' }}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>${{ number_format($product->price, 2) }}</td>
            </tr>
            <tr>
                <th>Stock</th>
                <td>{{ $product->stock }}</td>
            </tr>
            <tr>
                <th>Category</th>
                <td>{{ $product->category }}</td>
            </tr>
            <tr>
                <th>Brand</th>
                <td>{{ $product->brand }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    @if($product->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $product->created_at->format('Y-m-d H:i:s') }}</td>
            </tr>
            <tr>
                <th>Updated At</th>
                <td>{{ $product->updated_at->format('Y-m-d H:i:s') }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection