<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Requests;
use App\Http\Requests\BookEditRequest;
use App\Http\Controllers\Controller;
use App\Book;
use App\Category;
use App\AdminUser;
use Session;
use App\Http\Requests\BookRequest;
use App\BookItem;
use File;
use Auth;
use DB;
use Exception;

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
        $categories= Category::lists('name', 'id');
        return view('admin.book.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request\BookRequest $request input value
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $data=$request->all();
        $data['admin_user_id']=Auth::guard('admin')->user()->id;
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imagename=time() . '_'.$data['name'] .'.'. $img->getClientOriginalExtension();
            $data['image'] = $imagename;
            $img->move(public_path(config('path.upload_book')), $imagename);
        }
        $book=new Book($data);
        $result=$book->save();
        if ($result) {
            Session::flash('success', trans('book_manage_lang.create_success'));
            for ($i=0; $i < $book['quantity']; $i++) {
                    BookItem::create(['book_id' => $book['id']]);
            }
        } else {
            Session::flash('danger', trans('book_manage_lang.create_fail'));
        }
        
        return redirect()->route('admin.book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $list = Book::findOrFail($id);
            $bookitem=BookItem::select('id', 'book_id')->where('book_id', $id)->get();
            return view('admin.book.show', compact('list', 'bookitem'));
        } catch (Exception $ex) {
            Session::flash('danger', trans('book_manage_lang.noid'));
            return redirect()->route('admin.book.index');
        }
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
        try {
            $list = Book::findOrFail($id);
            $categories = Category::lists('name', 'id');
            return view('admin.book.edit', compact('list', 'categories'));
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
    public function update(BookEditRequest $request, $id)
    {
            $data = $request->all();
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imagename=time() . '_'.$data['name'] .'.'. $img->getClientOriginalExtension();
            $data['image'] = $imagename;
            $img->move(public_path(config('path.upload_book')), $imagename);
        }
            $list = Book::find($id);
        if (empty($list)) {
            Session::flash('danger', trans('book_manage_lang.danger'));
        } else {
            $list->update($data);
            Session::flash('success', trans('book_manage_lang.editsuccess'));
        }
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
        try {
            $bookItem = Book::findorFail($id)->bookItems->first();
            if (empty($bookItem)) {
                $result = Book::destroy($id);
                if ($result) {
                    Session::flash('success', trans('book_manage_lang.success_delete'));
                } else {
                    Session::flash('danger', trans('book_manage_lang.unsuccess_delete'));
                }
            } else {
                Session::flash('danger', trans('book_manage_lang.warning_not_empty'));
            }
            return redirect()->route('admin.book.index');
        } catch (ModelNotFoundException $ex) {
            Session::flash('danger', trans('book_manage_lang.noid'));
            return redirect()->route('admin.book.index');
        }
    }
}
