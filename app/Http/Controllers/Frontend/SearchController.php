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
            return view('frontend.index');
        }

        $book = Book::select('id', 'name', 'author', 'quantity', 'image', 'publish_year', 'number_of_page')->where('name', 'like', "%$search%")->orwhere('author', 'like', "%$search%")->get();

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
