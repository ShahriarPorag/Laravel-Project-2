@extends('backend.master')

@section('title', 'Create Product')

@section('body')
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Create Product</h3>
                    </div>
                    <div class="card-body">
                        <h3 class="text-success text-center">{{ Session::get('success') ? Session::get('success') : ''  }}</h3>
                        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-2">
                                <label for="name" class="col-md-4">Product Name</label>
                                <div class="col-md-8">
                                    <input type="text" name="product_name" class="form-control" />
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label for="name" class="col-md-4">Category Name</label>
                                <div class="col-md-8">
                                    <input type="text" name="category_name" class="form-control" />
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label for="name" class="col-md-4">Brand Name</label>
                                <div class="col-md-8">
                                    <input type="text" name="brand_name" class="form-control" />
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label for="name" class="col-md-4">Description</label>
                                <div class="col-md-8">
                                    <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label for="name" class="col-md-4">Image</label>
                                <div class="col-md-8">
                                    <input type="file" name="image" accept="image/*" />
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label for="name" class="col-md-4">Status</label>
                                <div class="col-md-8">
                                    <label for="published"><input type="radio" name="status" id="published" value="1" checked> Published</label>
                                    <label for="unPublished"><input type="radio" id="unPublished" name="status" value="0"> Unpublished</label>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label for="" class="col-md-4"></label>
                                <div class="col-md-8">
                                    <input type="submit" class="btn btn-success" value="Create Product" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
