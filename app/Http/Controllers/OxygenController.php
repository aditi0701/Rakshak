<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\oxygenDonor;
use Log;

class OxygenController extends Controller
{
    //
    function addData(Request $req){
        
        


        $oxygen =new oxygenDonor;
        $exist = DB::table('oxygen_donors') 
        ->select('*') 
        ->where('userid', auth()->id()) 
        ->get();
        $array = json_decode($exist);
        
        //validation
        $req->validate([
            'fname'=>['bail','required','max:15'],
            'lname'=>['required','max:15'],
            'orgname'=>['required','max:30'],
            'contactno'=>['required','numeric','digits:10','regex:/^([0-9\s\-\+\(\)]*)$/'],
            'city' =>['required','max:20'],
            'state'=>['required','max:30'],
            'address'=>['required','max:255'],
            'quantity'=>['required','numeric','max:3']
        ],
        [
            'fname'=>'Max of 15 characters allowed in FirstName',
            'lname'=>'Max of 15 characters allowed in LastName',
            'orgname'=>'Max of 30 characters allowed in organization name',
            'contactno'=>'10 numeric characters allowed in phone No',
            'city' =>'City name should be of max 20 characters',
            'state'=>'State name should be of max 30 characters',
            'address'=>'Max 255 characters allowed in address',
            'quantity'=>'Numeric characters in hundereds allowed in quantity.'
         
        ]
       );
        
        //updates the value if the question exixts
        if(!empty($array)){
            DB::table('oxygen_donors')
            ->where('userid', auth()->id()) 
            ->update(['fname' => $req->fname,
                        'lname' =>  $req->lname,
                        'orgname' =>  $req->orgname,
                        'contactno' =>  $req->contactno,
                        'city' =>  $req->city,
                        'state' =>  $req->state,
                        'address' =>  $req->address,
                        'quantity' => $req->quantity       
                    ]);
        }
        else{
            $oxygen->userid = auth()->id();
            $oxygen->fname = $req->fname;
            $oxygen->lname = $req->lname;
            $oxygen->orgname = $req->orgname;
            $oxygen->contactno = $req->contactno;
            $oxygen->city = $req->city;
            $oxygen->state = $req->state;
            $oxygen->address = $req->address;
            $oxygen->quantity = $req->quantity;
            $oxygen->save();
        }
        
        return redirect()->back()->with('status', 'Profile updated!');
        
    }
}
