<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prop;
use Illuminate\Support\Facades\DB;


class ClientController extends Controller
{
    //
    function index(){
        return view('client.index');
    }

    function property(){
        $property = Prop::all();
        $home = Prop::where('category', 'house')->get();
        $shop = Prop::where('category', 'shop')->get();
        return view('client.property.property', compact('property', 'home', 'shop'));
    }
    function property_details($id){
        $details = Prop::find($id);
        return view('client.property.property_detail', compact('details'));
    }
    function myProperty(){
        $myproperty = DB::table('props')
        ->join('rents','rents.property_id','props.id')
        ->select('props.name','props.rent','property_picture','rents.*')
        ->where('rents.user_id', session()->get('id'))
        ->get();
        return view('client.property.myproperty', compact('myproperty'));
    }

}
