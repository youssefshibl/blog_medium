<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Getfiles extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getfiles($filename){
        return response()->download(public_path('sound/' . $filename));
    }
}
