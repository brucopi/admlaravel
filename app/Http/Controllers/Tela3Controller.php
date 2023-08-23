<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tela3Controller extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('can:tela3');
    }

    public function tela3()
    {
        
        
        return view('tela3');

    }


}
