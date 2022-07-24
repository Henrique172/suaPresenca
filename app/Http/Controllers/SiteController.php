<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Event;
use App\models\User;

class SiteController extends Controller
{
    public function apresentacao(){
        return view('layouts.apresentacao');
    }
    public function index(){

        // $user = auth()->user();
        // dd($user->name);
 
        $search = request('search');
        if($search){
            $events = Event::where([[
                'title', 'like', '%'.$search.'%' ]])->get();

        }else{
            
            $events = \App\Models\Event::all();
        }


        return view ('welcome',['events' => $events, 'search'=> $search]);
        

    }


}
