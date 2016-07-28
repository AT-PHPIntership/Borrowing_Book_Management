<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Borrow;
use DB;

class HomeController extends Controller
{
    /**
     * Display view Homepage
     *
     * @return void
     */
    public function index()
    {
        // $borrow = Borrow::select('quantity','created_at')->get(); 
        return view('admin.chart');
    }

    public function getapi(){
    	
	     $stats = Borrow::select('quantity','created_at')->get();

	    return response()->json($stats, 200);
    }
}
