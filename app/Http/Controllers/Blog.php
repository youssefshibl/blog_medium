<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User ;
class Blog extends Controller
{
    //
    public function lists(){
        $lists =  auth()->user()->lists;
        return view('pages_.lists_main' , compact('lists'));
    }
    public function storelist(Request $request){
            if($request->has('list_name')){
                auth()->user()->lists()->create(['name'=> $request->input('list_name')]);
            return true;
            }
            return false ;

    }

    public function deletlist(Request $request){
        if($request->has('deleted_list')){
            auth()->user()->lists()->where('name' , $request->input('deleted_list'))->delete();
            return true;
        }
        return false;
    }
}
