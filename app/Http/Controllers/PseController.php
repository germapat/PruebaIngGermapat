<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PseController extends Controller
{
    public function show()
    {
        return view('pse.pse');
    }
}
