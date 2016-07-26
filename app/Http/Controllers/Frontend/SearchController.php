<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use App\Book;

class SearchController extends Controller
{
    public function getsearch(Request $request){
      
      $search = $request->input('valuesearch');
      
      if(!$search ) {
        return redirect()->route('/home');
      }

      $book = Book::select('id','name','author','quantity','image','publish_year','number_of_page')->where('name','like',"%$search%")->orwhere('author','like',"%$search%")->get();
      return view('frontend.searchs.results', compact('book'));
    }
    public function getjson(){
      $book = Book::all();
      return Response::json($book);
    }
}
