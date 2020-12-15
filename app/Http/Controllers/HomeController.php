<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Heading;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $headings = Heading::all();
        return view('heading.index', compact('headings'));
    }
}
