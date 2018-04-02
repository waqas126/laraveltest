<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdsModel;
use Auth;

class AdsController extends Controller
{
    public function publish_ad(){
        return view('ads.add_ad');
    }
    public function view_ads(){
        $ads = AdsModel::get();

        return view('ads.view_ad')->with(['ads' => $ads]);
    }

    public function submit_ad(request $request){
        $request->validate([
            'ad_title' => 'required',
            'ad_description' => 'required',
            'ad_city' => 'required',
            'company_name' => 'required',
        ]);

        $product = new AdsModel;
        $product->ad_title = $request->ad_title;
        $product->city = $request->ad_city;
        $product->ad_description = $request->ad_description;
        $product->company_name = $request->company_name;
        $product->posted_by = Auth::id();
        $product->save();
        return redirect('/user/publish_ad')->with('success','Add Published Successfully');
    }

    public function delete_ad($id){
        AdsModel::where('id',$id)->delete();
        return redirect('/user/view_ads')->with('success','Add Deleted Successfully');
    }

    public function edit_ad($id){
        $product = AdsModel::where('id',$id)->first();
        return view('ads.edit_view')->with('ad',$product);
    }

    public function update_ad(request $request){

        $request->validate([
            'ad_title' => 'required',
            'ad_description' => 'required',
            'ad_city' => 'required',
            'company_name' => 'required',
        ]);

        AdsModel::where('id',$request->id)->update(['ad_title' => $request->ad_title,'ad_description' => $request->ad_description,'city' => $request->ad_city,'company_name' => $request->company_name]);
        return redirect()->route('edit_ad',['id'=>$request->id])->with('success','Ad Updated Successfully');
    }
}
