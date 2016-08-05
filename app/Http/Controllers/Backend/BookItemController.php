<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Exception;
use App\BookItem;
use App\Book;
use Session;

class BookItemController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $bookitem=BookItem::findorFail($id);
            $result = BookItem::destroy($id);
            if ($result) {
                $book= Book::findorFail($bookitem->book_id);
                if ($book) {
                    $book['quantity']-=1;
                    $book->update();
                    Session::flash('success', trans('book_manage_lang.success_delete'));
                } else {
                    Session::flash('danger', trans('book_manage_lang.noid'));
                }
            } else {
                Session::flash('danger', trans('book_manage_lang.unsuccess_delete'));
            }
            return redirect()->route('admin.book.show', $bookitem->book_id);
        } catch (Exception $ex) {
            Session::flash('danger', trans('book_manage_lang.book_item_no'));
            return redirect()->route('admin.book.show', $bookitem->book_id);
        }
    }
}
