<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prop;
use App\Models\Rent;
use Session;

class AdminController extends Controller
{
    //
    function admin(){
        return view('Admin.index');
    }
    function manage_property(){
        $property = Prop::all();
        return view('Admin.property', compact('property'));
    }
    function add_property(Request $req){
        $validation = [
            'name' => 'required',
        ];
        $exist = Prop::Where('name', $req->name)->exists();
        if ($exist) {
            Session::flash('error', 'Property already exist!');
            return back();
        }
        $store = new Prop();
        $store->name = $req->name;
        $store->property_picture = $req->file('file')->getClientOriginalName();
        $req->file('file')->move('uploads/property', $store->property_picture);
        $store->description = $req->description;
        $store->address = $req->address;
        $store->rent = $req->rent;
        $store->category = $req->category;
        $store->save();
        Session::flash('success', 'Property Added Successfully!');
        return back();
    }

    function update_property(Request $req)
    {
        $update = Prop::find($req->id);
        $update->name = $req->name;

        if ($req->file('file') != null) {
            //save image in database
            $update->venue_picture = $req->file('file')->getClientOriginalName();
            $req->file('file')->move('uploads/property', $update->venue_picture);
        }
        $update->description = $req->description;
        $update->address = $req->address;
        $update->rent = $req->rent;
        $update->category = $req->category;
        $update->save();
        Session::flash('success', 'Property updated Successfully!');
        return back();
    }
    function delete_property($id)
    {
        $delete = Prop::find($id);
        $delete->delete();
        Session::flash('success', 'Property deleted successfully!');
        return back();
    }

    function rented_property(){
        $rent = Rent::all();
        return view('Admin.rents', compact('rent'));
    }
    function delete_rents($id)
    {
        $delete = Rent::find($id);
        $delete->delete();
        Session::flash('success', 'Property deleted successfully!');
        return back();
    }
}
