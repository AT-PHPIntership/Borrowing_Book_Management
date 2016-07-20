<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserEditRequest;
use App\Http\Controllers\Controller;
use App\User;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
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
        $users = User::find($id);
        if (empty($users)) {
            Session::flash(trans('user.danger'),trans('user.editfind'));
            return redirect() -> route('admin.user.index');  
        }
        return  view('admin.users.edit', compact('users'));     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request\UserEditRequest $request request
     * @param int                                      $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $data = $request -> all();
        if ($request -> hasFile(trans('user.img'))) {
            $img = $request->file(trans('user.img'));
            $imgname = time() . '_'.$data[trans('user.fullname')] .'.'. $img->getClientOriginalExtension();
            $data[trans('user.img')] = $imgname;
            $img->move(public_path(config('path.upload_user')), $imgname);
        }
        $users = User::find($id);
        if (empty($users)) {
            Session::flash(trans('user.danger'), trans('user.editfail'));
        } else {
            $users -> update($data);
            Session::flash(trans('user.success'), trans('user.editsuccess'));
        }
        return redirect() -> route('admin.user.index');
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
