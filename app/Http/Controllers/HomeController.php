<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\plasmaDonor;
use App\Models\oxygenDonor;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $states = DB::table('states')
                ->select('name') 
                ->get();

        $i=0;
        foreach($states as $state){
            $state_arr[$i] = $state->name; 
            $i++;
        }   
        // return $state_arr;     
        // return json_decode($states,TRUE);  
          
        $plasma = [];
        foreach ($state_arr as $key => $value) {
            $plasma[] = plasmaDonor::where('state','=',$value)->count();
        }

        $oxygen = [];
        foreach ($state_arr as $key => $value) {
            $oxygen[] = oxygenDonor::where('state','=',$value)->sum('quantity');
        }
        
        // return $oxygen;
        return view('home')->with('state_arr',json_encode($state_arr))->with('plasma',json_encode($plasma,JSON_NUMERIC_CHECK))->with('oxygen',json_encode($oxygen,JSON_NUMERIC_CHECK));


        

       
    
        // return view('home');
    }
}
