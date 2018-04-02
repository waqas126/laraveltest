<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\CarsModel;

class CarsController extends Controller
{
    public function add_car(){
        return view('cars.add_car');
    }

    public function view_cars(){
        $cars = CarsModel::get();

        return view('cars.view_cars')->with(['cars' => $cars]);
    }

    public function submit_car(request $request){
        $request->validate([
            'car_model' => 'required',
            'car_maker' => 'required',
            'car_color' => 'required',
            'car_description' => 'required',
            'car_price' => 'required|numeric',
            'file' => 'required|mimes:jpeg,jpg,png',
        ]);

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/cars');
            $image->move($destinationPath, $name);
        }
        $product = new CarsModel;
        $product->car_model = $request->car_model;
        $product->car_maker = $request->car_maker;
        $product->car_price = $request->car_price;
        $product->car_description = $request->car_description;
        $product->color = $request->car_color;
        $product->car_image = $name;
        $product->posted_by = Auth::id();
        $product->save();
        return redirect('/user/add_car')->with('success','Car Added Successfully');
    }

    public function delete_car($id){
        CarsModel::where('id',$id)->delete();
        return redirect('/user/view_cars')->with('success','Car Deleted Successfully');
    }

    public function edit_product($id){
        $car = CarsModel::where('id',$id)->first();
        return view('cars.edit_view')->with('car',$car);
    }

    public function update_car(request $request){

        $request->validate([
            'car_model' => 'required',
            'car_maker' => 'required',
            'car_color' => 'required',
            'car_description' => 'required',
            'car_price' => 'required|numeric',

        ]);

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/cars');
            $image->move($destinationPath, $name);

            CarsModel::where('id',$request->id)->update(['car_model' => $request->car_model,'car_maker' => $request->car_maker,'color' => $request->car_color,'car_price' => $request->car_price,'car_description' => $request->car_description,'car_image' => $name ]);

        } else {
            CarsModel::where('id',$request->id)->update(['car_model' => $request->car_model,'car_maker' => $request->car_maker,'color' => $request->car_color,'car_price' => $request->car_price,'car_description' => $request->car_description]);
        }

        return redirect()->route('edit_car',['id'=>$request->id])->with('success','Car Updated Successfully');
    }

}
