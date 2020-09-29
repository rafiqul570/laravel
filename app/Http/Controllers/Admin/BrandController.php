<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Brand;

class BrandController extends Controller
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


    public function index()
    {
        $brands = brand::latest()->paginate(6);  
        return view('admin.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
       'brand_name' => 'required|unique:brands,brand_name',

       ]);
       Brand::insert([

        'brand_name' => $request->brand_name,
        'created_at' => Carbon::now(),

       ]);
     return Redirect()->back()->with('success','Brand Inserted');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = brand::find($id);
        return view('admin.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $id = $request->id;
      Brand::find($id)->update([
      'brand_name' => $request->brand_name,
      'updated_at' => Carbon::now()
    ]);


  return Redirect()->route('admin.brand')->with('update','Brand Updated Successfully.'); 
  }
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::find($id)->delete();
        return Redirect()->back()->with('delete','Brand Deleted Successfully.');

    }

    public function inactive($id){
        Brand::find($id)->update(['status' => 0]);
        return Redirect()->back()->with('inactive','Brand Inactive Successfully.');
    }

    public function active($id){
        Brand::find($id)->update(['status' => 1]);
        return Redirect()->back()->with('active','Brand activated Successfully.');
    }
}
