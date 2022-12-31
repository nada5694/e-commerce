<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ElementsController extends Controller
{
    public function index()
    {
        return view('layouts.website.elements');
    }
}
