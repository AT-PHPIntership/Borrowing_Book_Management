<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Book;
use Session;

class CategoryController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
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
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = Category::findorFail($id)->books->first();
                if (empty($category)) {
                    $result = Category::destroy($id);
                    if ($result) {
                        Session::flash('success', trans('category_manage_lang.message_success_delete'));
                    } else {
                        Session::flash('success', trans('category_manage_lang.message_unsuccess_delete'));
                    }
                } else {
                    Session::flash('danger', trans('category_manage_lang.message_warning_category_exist'));
                } 
            return redirect()->route('admin.category.index');            
        } catch(ModelNotFoundException $ex) {
            Session::flash('success', trans('category_manage_lang.error'));
        } 
    }
}
