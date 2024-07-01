<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RentNotification;
use App\Models\Rent;
use Session;

class RentController extends Controller
{
    //
    function rent_property(Request $req){

        $validate = [
            'property_id' => 'required',
        ];
        
        $exist = Rent::where('property_id', $req->input('property_id'))->exists();
        
        if ($exist) {
            Session::flash('error', 'This Property is already rented!');
            return back();
        }

        if(session()->has('id')){
        $rent = new Rent();
        $rent->phone = $req->phone;
        //save image in database
        $rent->picture=$req->file('file')->getClientOriginalName();
        $req->file('file')->move('uploads/customers', $rent->picture);
        $rent->current_address = $req->current_address;
        $rent->lease_term = $req->lease_term;
        $rent->requirements = $req->requirements;
        $rent->user_id = session()->get('id');
        $rent->property_id = $req->input('property_id');
        $rent->save();
        Session::flash('success', 'Congratulations! You Rent your property Successfully!');
        // $this->RentNotification($rent);
        return back();
        }
        else{
            return redirect('login')->with('error', 'Please Login first to Rent a Property!');
        }
        
    }

    // function RentNotification($rent){
    //     $rent = [
    //         'title' => "Rent Notification",
    //         'message' => "Congratulations! You Rent your property Successfully! Pleade  visit us within 2 days so we can proceed furter.",
    //         'email' => session('email')
    //     ];
    //     Mail::to($rent['email'])->send(new RentNotification($rent));
    // }

    
}
