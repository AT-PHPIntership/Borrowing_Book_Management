<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\GiveBackRequest;
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
     * User give back book.
     *
     * @param \Illuminate\Http\UserRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function giveBack(GiveBackRequest $request)
    {
        try {
            $id = $request->item;
            $borrowId = $request->borrowid;
            $update_array = array_count_values($borrowId);
            $ids = implode(',', array_keys($update_array));
            $sql = "UPDATE borrows SET quantity = CASE id";
            foreach ($update_array as $keys => $value) {
                $sql .= sprintf(" WHEN %d THEN quantity-%d ", $keys, $value);
            }
            $sql .= "END WHERE id IN ($ids);";
            $result = DB::update($sql);
            if ($result == count($update_array)) {
                BorrowDetail::whereIn('id', $id)->update(array('status' => config('define.give_back')));
                Session::flash('success', trans('borrow.successfully'));
                return redirect()->route('admin.borrowdetail.index');
            } else {
                Session::flash('danger', trans('borrow.error'));
                return redirect()->route('admin.borrowdetail.index');
            }
        } catch (ModelNotFoundException $ex) {
            Session::flash(trans('borrow.danger'), trans('borrow.error'));
            return redirect()->route('admin.borrowdetail.index');
        }
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
                        ->where('borrow_details.status', '=', config('define.not_give_back'))
                        ->get();
        return Response::json($data);
    }
}
