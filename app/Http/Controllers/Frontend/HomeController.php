<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use App\Book;

class HomeController extends Controller
{
    public function getindex(){
    	return view('frontend.index');
    }
}
