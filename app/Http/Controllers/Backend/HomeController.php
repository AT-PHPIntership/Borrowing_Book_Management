<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    // Display view Homepage
    public function index()
    {
        return view('admin.layouts.master');
    }
}
