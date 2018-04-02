<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\ProductsModel;
class ProductsController extends Controller
{
  public function add_product(){
     return view('products.add_product');
  }
  public function view_products(){
      $products = ProductsModel::get();

      return view('products.view_products')->with(['products' => $products]);
  }

  public function submit_product(request $request){
      $request->validate([
          'product_title' => 'required',
          'product_description' => 'required',
          'product_price' => 'required|numeric',
          'file' => 'required|mimes:jpeg,jpg,png',
      ]);
      if ($request->hasFile('file')) {
          $image = $request->file('file');
          $name = time() . '.' . $image->getClientOriginalExtension();
          $destinationPath = public_path('/products');
          $image->move($destinationPath, $name);
      }
      $product = new ProductsModel;
      $product->product_title = $request->product_title;
      $product->product_price = $request->product_price;
      $product->product_description = $request->product_description;
      $product->product_image = $name;
      $product->added_by = Auth::id();
      $product->save();
      return redirect('/user/add_product')->with('success','Product Added Successfully');
  }

 public function delete_product($id){
      ProductsModel::where('id',$id)->delete();
     return redirect('/user/view_products')->with('success','Product Deleted Successfully');
 }

 public function edit_product($id){
      $product = ProductsModel::where('id',$id)->first();
      return view('products.edit_view')->with('product',$product);
 }

    public function update_product(request $request){
        $request->validate([
            'product_title' => 'required',
            'product_description' => 'required',
            'product_price' => 'required|numeric',

        ]);
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/products');
            $image->move($destinationPath, $name);
        ProductsModel::where('id',$request->id)->update(['product_title' => $request->product_title,'product_price' => $request->product_price,'product_description' => $request->product_description,'product_image' => $name]);
        } else {
            ProductsModel::where('id',$request->id)->update(['product_title' => $request->product_title,'product_price' => $request->product_price,'product_description' => $request->product_description]);

        }
        return redirect()->route('edit_product',['id'=>$request->id])->with('success','Product Added Successfully');
    }

}
