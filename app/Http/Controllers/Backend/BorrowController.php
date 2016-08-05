<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Borrow;
use App\BorrowDetail;
use DB;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrows = Borrow::join('borrow_details', 'borrows.id', '=', 'borrow_details.borrow_id')->select('borrows.*', 'borrow_details.borrow_id', DB::raw('count(borrow_details.borrow_id) as total'))->groupBy('borrow_details.borrow_id')->orderBy('borrows.created_at', 'desc')->get();
        return view('admin.borrows.index', compact('borrows'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id Borrow
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $borrowDetail = BorrowDetail::where('borrow_id', $id)->get();
            return view('admin.borrows.show', compact('borrowDetail'));
        } catch (ModelNotFoundException $ex) {
            Session::flash('danger', trans('labels.not_found'));
            return redirect()->route('admin.borrow.index');
        }
    }
}
