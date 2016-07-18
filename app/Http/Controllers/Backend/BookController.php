<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\BookRequest;
use App\Http\Controllers\Controller;
use App\Book;
use App\Category;
use File;
use Auth;

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
        $categories=Category::lists('name','id');
        return view('admin.book.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request\BookRequest $request input value
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $book = new Book();
        $data=$request->all();
        dd($data);
        $data['image']='abc.jpg';
        $data['admin_user_id']=Auth::guard('admin')->user()->id;
        $book=new Book($data);
        $book->save();
        // $book->name= $request->name;
        // $book->category_id= $request->category;
        // $book->author= $request->author;
        // $book->publish_year=$request->publish_year;
        // $book->number_of_page=$request->number_of_page;
        // $book->quantity=$request->quantity;
        // if ($request->hasFile('image')) {
        //     $img = $request->file('image');
        //     $imagename=time() . '_' . $img->getClientOriginalName();
        //     $book->image = $imagename;
        //     $img->move(public_path(config('upload.path')), $imagename);
        // }
        // $book->admin_user_id=Auth::guard('admin')->user()->id;
        // $book->save();
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
