@extends('backend.master')

@section('title', 'Manage Product')

@section('body')
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Manage Product</h3>
                    </div>
                    <div class="card-body">
                        <h3 class="text-success text-center">{{ Session::get('success') ? Session::get('success') : ''  }}</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Category Name</th>
                                    <th>Brand Name</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->category_name }}</td>
                                        <td>{{ $product->brand_name }}</td>
                                        <td>
                                            <img src="{{ asset($product->image) }}" alt="" style="height: 80px" />
                                        </td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td>
                                            <a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="{{ route('product.destroy', ['id' => $product->id]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
