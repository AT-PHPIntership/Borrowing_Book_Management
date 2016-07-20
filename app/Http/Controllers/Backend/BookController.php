<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\BookEditRequest;
use App\Http\Controllers\Controller;
use App\Book;
use App\Category;
use App\AdminUser;
use Auth;
use Session;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list= Book::all();
        return view('admin.book.index', compact('list'));
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
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list = Book::find($id);
        $categories = Category::lists('name', 'id');
        if($list){
            Session::flash('error',trans('book_manage_lang.noid' ));
        }
        return view('admin.book.edit', compact('list', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param int                      $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(BookEditRequest $request, $id)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $img = time() . '_' .$request->file('image')->getClientOriginalName();
            $request->file('image')->move(config('path.upload_book'), $img);
            $data['image'] = $img;
        }
        $list = Book::find($id);
        $list->update($data);
        return redirect() -> route('admin.book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $list = Book::find($id);
        if(empty($list)){
            Session::flash('error',trans('book_manage_lang.noid' ));
        }
        $list->delete();
        return redirect()->route('admin.book.index');
    }
}
