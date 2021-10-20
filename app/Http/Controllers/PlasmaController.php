<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\plasmaDonor;
use Log;

class PlasmaController extends Controller
{
    function addData(Request $req){

        $plasma =new plasmaDonor;

        
        
        $exist = DB::table('plasma_donors') 
        ->select('*') 
        ->where('userid', auth()->id()) 
        ->get();
        $array = json_decode($exist);
        
        //validation
        $req->validate([
            'fname'=>['bail','required','max:15'],
            'lname'=>['required','max:15'],
            'gender'=>['required','max:7'],
            'contactno'=>['required','numeric','digits:10','regex:/^([0-9\s\-\+\(\)]*)$/'],
            'city' =>['required','max:20'],
            'state'=>['required'],
            'address'=>['required','max:255'],
            'bloodgroup'=>['required'],
            'confirm'=>['required'],
            'symptoms'=>['required'],
            'novirus'=>['required'],
            'consent'=>['required'],
            'available'=>['required']
        ],
        [
            'fname'=>'Max of 15 characters allowed in FirstName',
            'lname'=>'Max of 15 characters allowed in LastName',
            'gender'=>'Max of 7 characters allowed in gender',
            'contactno'=>'10 numeric characters allowed in phone No',
            'city' =>'City name should be of max 20 characters',
            'address'=>'Max 255 characters allowed in address',
           
        ]
       );
        
        //updates the value if the question exixts
        if(!empty($array)){

            DB::table('plasma_donors')
            ->where('userid', auth()->id()) 
            ->update(['fname' => $req->fname,
                        'lname' =>  $req->lname,
                        'gender' =>  $req->gender,
                        'contactno' =>  $req->contactno,
                        'city' =>  $req->city,
                        'state' =>  $req->state,
                        'address' =>  $req->address,
                        'bloodgroup' => $req->bloodgroup, 
                        'confirm' => $req->confirm,
                        'symptoms' =>   $req->symptoms,
                        'novirus' =>   $req->novirus,
                        'consent' =>   $req->consent, 
                        'available' =>   $req->available       
                    ]);
        }    
        else{
            $plasma->userid = auth()->id();
            $plasma->fname = $req->fname;
            $plasma->lname = $req->lname;
            $plasma->gender = $req->gender;
            $plasma->contactno = $req->contactno;
            $plasma->city = $req->city;
            $plasma->state = $req->state;
            $plasma->address = $req->address;
            $plasma->bloodgroup = $req->bloodgroup;
            $plasma->confirm = $req->confirm;
            $plasma->symptoms = $req->symptoms;
            $plasma->novirus = $req->novirus;
            $plasma->consent = $req->consent;
            $plasma->available = $req->available;            
            $plasma->save();
        }    
        
        return redirect()->back()->with('status', 'Profile updated!');
        
    }
}
