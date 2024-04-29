<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    public function index ()
    {

        return view('backend.product.index', [
            'products' => Product::all()
        ]);
    }

    public function create ()
    {
        return view('backend.product.create');
    }

    public function store (Request $request)
    {
        Product::createProduct($request);
        return back()->with('success', 'Product created successfully');
    }
    public function edit ($id)
    {
        return view('backend.product.edit', [
            'product'   => Product::find($id)
        ]);
    }

    public function update (Request $request, $id)
    {
        Product::updateProduct($request, $id);
        return redirect('/manage-product')->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $this->product = Product::find($id);
        if (file_exists($this->product->image))
        {
            unlink($this->product->image);
        }
        $this->product->delete();
        return back()->with('success', 'Product deleted successfully');
    }
}
