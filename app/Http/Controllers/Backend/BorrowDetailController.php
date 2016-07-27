<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\BorrowDetail;
use App\BookItem;
use App\Borrow;
use App\User;
use Response;
use Session;
use DB;

class BorrowDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.borrows.turnback');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
    /**
     * User give back book.
     *
     * @param \Illuminate\Http\UserRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function giveBack(Request $request)
    {
        $item = $request->item;
        $count = 0;
        for ($i = 1; $i < count($item); $i++) {
            try {
                $borrowdetail = BorrowDetail::findOrFail($item[$i]);
                $result = $borrowdetail -> update(['status' => 1 ]);
                if ($result) {
                    $borrow = Borrow::findOrFail($borrowdetail['borrow_id']);
                    $borrow -> update(['quantity' => ($borrow['quantity'] - 1) ]);
                    $count++;
                }
            } catch (ModelNotFoundException $ex) {
                Session::flash(trans('borrow.danger'), trans('borrow.notfind'));
                return redirect()->route('admin.borrowdetail.index');
            }
        }
        if ($count == (count($item)-1)) {
            Session::flash(trans('borrow.success'), trans('borrow.successfully'));
        } else {
            Session::flash(trans('borrow.danger'), trans('borrow.fail'));
        }
        return redirect()->route('admin.borrowdetail.index');
    }
    /**
     * Get data json.
     *
     * @return \Illuminate\Http\Response
     */
    public function getBorrow()
    {
        $data = DB::table('borrow_details', 'book_items')
                        ->join('borrows', 'borrow_details.borrow_id', '=', 'borrows.id')
                        ->join('users', 'borrows.user_id', '=', 'users.id')
                        ->join('book_items', 'borrow_details.book_item_id', '=', 'book_items.id')
                        ->join('books', 'book_items.book_id', '=', 'books.id')
                        ->select('borrow_details.id', 'borrow_details.borrow_id', 'borrow_details.book_item_id', 'borrows.user_id', 'users.fullname', 'books.name')
                        ->where('borrow_details.status', '=', '0')
                        ->get();
        return Response::json($data);
    }
}
