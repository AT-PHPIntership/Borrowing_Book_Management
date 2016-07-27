<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use App\Book;

class SearchController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request\BookRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function getsearch(Request $request)
    {
      
        $search = $request->input('valuesearch');
      
        if (!$search) {
            $categories = Book::select('category_id')->distinct()->get();
            $books = Book::paginate(9);
            $images = Book::select('image')->take(3)->get();
            $imagedefault = Book::select('image')->take(1)->get();

            return view('frontend.index', compact('categories', 'books', 'images', 'imagedefault'));
        }

        $book = Book::select('id', 'name', 'author', 'category_id', 'quantity', 'image', 'publish_year', 'number_of_page')->where('name', 'like', "%$search%")->orwhere('author', 'like', "%$search%")->get();

        return view('frontend.searchs.results', compact('book'));
    }
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getjson()
    {
        $book = Book::all();
        return Response::json($book);
    }
}
