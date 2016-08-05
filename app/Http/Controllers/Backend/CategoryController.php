<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use Auth;
use App\Book;
use Session;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use Exception;

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
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $data = $request->all();
        $data['admin_user_id'] = Auth::guard('admin')->user()->id;
        $category = new Category($data);
        $result = $category->save();
        if ($result) {
            Session::flash('success', trans('category_manage_lang.success_create'));
        } else {
            Session::flash('danger', trans('category_manage_lang.unsuccess_create'));
        }
        return redirect()->route('admin.category.index');
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
            $category = Category::findorFail($id);
            return view('admin.category.edit', compact('category'));
        } catch (Exception $ex) {
            Session::flash('danger', trans('category_manage_lang.warning_category_not_exist'));
            return redirect()->route('admin.category.index');
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
    public function update(EditCategoryRequest $request, $id)
    {
        try {
            $data = $request->all();
            $category = Category::findorFail($id);
            $result = $category->update($data);
            if ($result) {
                Session::flash('success', trans('category_manage_lang.success_update'));
            } else {
                Session::flash('danger', trans('category_manage_lang.unsuccess_update'));
            }
                return redirect()->route('admin.category.index');
        } catch (Exception $ex) {
            Session::flash('danger', trans('category_manage_lang.warning_category_not_exist'));
            return redirect()->route('admin.category.index');
        }
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
                    Session::flash('success', trans('category_manage_lang.success_delete'));
                } else {
                    Session::flash('danger', trans('category_manage_lang.unsuccess_delete'));
                }
            } else {
                Session::flash('danger', trans('category_manage_lang.warning_category_exist'));
            }
            return redirect()->route('admin.category.index');
        } catch (Exception $ex) {
            Session::flash('danger', trans('category_manage_lang.warning_category_not_exist'));
            return redirect()->route('admin.category.index');
        }
    }
}
