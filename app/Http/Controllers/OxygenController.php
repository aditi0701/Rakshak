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
