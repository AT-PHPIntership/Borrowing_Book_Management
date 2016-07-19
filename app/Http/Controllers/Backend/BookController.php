<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;
use App\Book;
use App\BookItem;
use App\Category;
use File;
use Auth;
use DB;

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
        // $book = new Book();
        $data=$request->all();
        $data['admin_user_id']=Auth::guard('admin')->user()->id;
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imagename=time() . '_'.$data['name'] .'.'. $img->getClientOriginalExtension();
            $data['image'] = $imagename;
            $img->move(public_path(config('path.upload')), $imagename);
        }
        $book=new Book($data);
        $book->save();
        $bookItem=Book::orderBy('created_at', 'desc')->first();
        for ($i=0; $i < $data['quantity']; $i++) {
            BookItem::create(['book_id' => $bookItem['id']]);
        }
        return redirect()->route('admin.book.index');
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
}
