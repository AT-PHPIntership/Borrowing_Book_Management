<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\BorrowDetail;
use App\Borrow;
use Auth;

class BorrowDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $listBorrowDetail = BorrowDetail::join('borrows', 'borrow_details.borrow_id', '=', 'borrows.id')->where('borrows.user_id', $user_id)->get();
        return view('frontend.borrows.index', compact('listBorrowDetail'));
    }
}
