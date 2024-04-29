<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_name', 'category_name', 'brand_name', 'description', 'image', 'status'];

    protected static $product, $imageObject, $imageName, $imageDirectory, $imageUrl;

    protected static function imageUpload($request, $product = null)
    {
        self::$imageObject = $request->file('image');
        if (self::$imageObject)
        {
            if (!empty($product))
            {
                if (file_exists($product->image))
                {
                    unlink($product->image);
                }
            }
            self::$imageName = time().self::$imageObject->getClientOriginalName();
            self::$imageDirectory = 'backend/uploaded-files/products/';
            self::$imageObject->move(self::$imageDirectory, self::$imageName);
            self::$imageUrl = self::$imageDirectory.self::$imageName;
        } else {
            if (!empty($product))
            {
                self::$imageUrl = $product->image;
            } else {
                self::$imageUrl = null;
            }
        }
        return self::$imageUrl;
    }

    public static function createProduct($request)
    {
        self::$product                      = new Product();
        self::$product->product_name        = $request->product_name;
        self::$product->category_name       = $request->category_name;
        self::$product->brand_name          = $request->brand_name;
        self::$product->description         = $request->description;
        self::$product->image               = self::imageUpload($request);
        self::$product->status              = $request->status;
        self::$product->save();
    }

    public static function updateProduct($request, $id)
    {
        self::$product                      = Product::find($id);
        self::$product->product_name        = $request->product_name;
        self::$product->category_name       = $request->category_name;
        self::$product->brand_name          = $request->brand_name;
        self::$product->description         = $request->description;
        self::$product->image               = self::imageUpload($request, self::$product);
        self::$product->status              = $request->status;
        self::$product->save();
    }
}
