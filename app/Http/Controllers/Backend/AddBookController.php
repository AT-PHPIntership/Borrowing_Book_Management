<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Book;
use App\Http\Requests\AddBookRequest;
use Exception;
use App\BookItem;
use Session;

class AddBookController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $book = Book::findorFail($id);
            return view('admin.book.addbook', compact('book'));
        } catch (Exception $ex) {
            Session::flash('danger', trans('book_manage_lang.noid'));
            return redirect()->route('admin.book.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param int                      $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(AddBookRequest $request, $id)
    {
        try {
            $book = Book::findorFail($id);
            $number = $request->input('quantity_additional');
            $book->quantity = $book['quantity'] + $number;
            $result = $book->save();
            if ($result) {
                Session::flash('success', trans('book_manage_lang.success_add_book'));
                for ($i=0; $i < $number; $i++) {
                    BookItem::create(['book_id' => $book['id']]);
                }
            } else {
                Session::flash('danger', trans('book_manage_lang.unsuccess_add_book'));
            }
            return redirect()->route('admin.book.index');
        } catch (Exception $ex) {
            Session::flash('danger', trans('book_manage_lang.noid'));
            return redirect()->route('admin.book.index');
        }
    }
}
