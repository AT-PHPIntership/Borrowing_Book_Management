<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Book;
use App\Category;
use Exception;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Book::select('category_id')->distinct()->get();
        $books = Book::paginate(config('define.number_pages'));
        $images = Book::select('image')->take(config('define.number_images_slide'))->get();
        $imagedefault = Book::select('image')->take(config('define.number_image_default'))->get();

        return view('frontend.index', compact('categories', 'books', 'images', 'imagedefault'));
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
            $book = Book::findorFail($id);
            return view('frontend.showbook', compact('book'));
        } catch (Exception $ex) {
            return view('errors.404');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function filter($id)
    {
        $books = Book::select('id', 'name', 'category_id', 'author', 'publish_year', 'number_of_page', 'quantity', 'image')->where('category_id', $id)->paginate(config('define.number_pages'));
        if (!empty($books)) {
            $imagedefault = Book::select('image')->take(config('define.number_image_default'))->get();
            $images = Book::select('image')->take(config('define.number_images_slide'))->get();
            $categories = Book::select('category_id')->distinct()->get();
            
            return view('frontend.index', compact('books', 'categories', 'images', 'imagedefault'));
        } else {
            return view('errors.404');
        }
    }
}
