<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tela2Controller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:tela2');
    }


    public function tela2()
    {
        
        
        return view('tela2');

    }
}
