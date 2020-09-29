<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Category;
use App\Brand;
use App\Product;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

//====================Add Porduct=============================
    public function addProduct()
    {
       $categories = Category::latest()->get();
       $brands = Brand::latest()->get();
       return view('admin.product.add',compact('categories','brands'));
    }
//==================Store Product=============================
    public function storeProduct(Request $request)
    {
      $request->validate([                  //Validetion//
       'product_name' => 'required|max:255',
       'product_code' => 'required|max:255',
       'price' => 'required|max:255',
       'product_quantity' => 'required|max:255',
       'category_id' => 'required|max:255',
       'brand_id' => 'required|max:255',
       'short_description' => 'required',
       'long_description' => 'required',
       'image_one' => 'required|mimes:jpg,jpeg,png,gif',
       'image_two' => 'required|mimes:jpg,jpeg,png,gif',
       'image_three' => 'required|mimes:jpg,jpeg,png,gif',
       ],[

       'category_id.required' => 'Select Category name',
       'brand_id.required' => 'Select Brand name',
       

       ]);
       
       $image_one = $request->file('image_one');
       $name_gen = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
       Image::make($image_one)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen);
       $img_url1 = 'fontend/img/product/upload/'.$name_gen;

       $image_two = $request->file('image_two');
       $name_gen = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
       Image::make($image_two)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen);
       $img_url2 = 'fontend/img/product/upload/'.$name_gen;

       $image_three = $request->file('image_three');
       $name_gen = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
       Image::make($image_three)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen);
       $img_url3 = 'fontend/img/product/upload/'.$name_gen;

//=====Insert Product========
       Product::insert([
              'category_id' => $request->category_id,
              'brand_id' => $request->brand_id,
              'product_name' => $request->product_name,
              'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),
              'product_code' => $request->product_code,
              'price' => $request->price,
              'product_quantity' => $request->product_quantity,
              'short_description' => $request->short_description,
              'long_description' => $request->long_description,
              'image_one' => $img_url1,
              'image_two' => $img_url2,
              'image_three' => $img_url3,
              'created_at' => Carbon::now(),

       ]);

       return Redirect()->back()->with('success','Product Inserted Successfully.');
    
    }


//====================Manage Porduct=============================

     public function manageProduct()
    {
       $products = Product::latest()->get();
       return view('admin.product.manage',compact('products'));
    }
//====================Edit Porduct=============================
     public function editProduct($product_id)
    {
        $product = product::findOrFail($product_id);
        $categories = Category::latest()->get();
       $brands = Brand::latest()->get();
        return view('admin.product.edit',compact('product','categories','brands'));
    }

//====================Update Porduct data=============================
    public function updateProduct(Request $request){
      $product_id = $request->id;
      Product::findOrFail($product_id)->Update([
              'category_id' => $request->category_id,
              'brand_id' => $request->brand_id,
              'product_name' => $request->product_name,
              'product_slug' => strtolower(str_replace(' ','-',$request->product_name)),
              'product_code' => $request->product_code,
              'price' => $request->price,
              'product_quantity' => $request->product_quantity,
              'short_description' => $request->short_description,
              'long_description' => $request->long_description,
              'update_at' => Carbon::now(),

       ]);

   return Redirect()->route('manage.products')->with('update','Product Updated Successfully.');
    }
    
}
