<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
   protected $fillable = [
        'category_id','brand_id', 'product_name','product_slug','product_code','product_quantity','short_description','long_description','price','image_one','image_two','image_three','status', 
    ];

//Table Joint(Product Table and category table)
    public function category(){
    	return $this->belongsTo(Category::class,'category_id');
    }

}
