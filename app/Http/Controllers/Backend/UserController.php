<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Redirect;
use App\Http\Requests;
use App\Http\Requests\UserEditRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Borrow;
use Auth;
use App\Http\Requests\UserRequest;
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
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\UserRequest $request User request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['admin_user_id'] = Auth::guard('admin')->user()->id;
        $img = null;
        if ($request->hasFile('image')) {
            $img = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image') -> move(config('path.upload_user'), $img);
        }
        $data['image'] = $img;
        $data['password'] = bcrypt($request->password);
        $data['birthday'] = date(config('path.formatdate'), strtotime($request->birthday));
        $data['expiretime'] = date(config('path.formatdate'), strtotime($request->expiretime));
        try {
            $user = new User($data);
            $user->save();
            Session::flash('success', trans('user.successful_message'));
            return redirect()->route('admin.user.index');
        } catch (Exception $e) {
            Session::flash('danger', trans('user.error_message'));
            return redirect()->route('admin.user.create');
        }
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
            $user = User::findOrFail($id);
            return  view('admin.users.show', compact('user'));
        } catch (ModelNotFoundException $e) {
            Session::flash(trans('user.danger'), trans('user.fail'));
            return redirect()->route('admin.user.index');
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
            $users = User::findOrFail($id);
            return  view('admin.users.edit', compact('users'));
        } catch (ModelNotFoundException $e) {
            Session::flash(trans('user.danger'), trans('user.editfind'));
            return redirect() -> route('admin.user.index');
        }
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
        $data['birthday'] = date(config('path.formatdate'), strtotime($request->birthday));
        $data['expiretime'] = date(config('path.formatdate'), strtotime($request->expiretime));
        try {
            $users = User::findOrFail($id);
            $users -> update($data);
            Session::flash(trans('user.success'), trans('user.editsuccess'));
            return redirect() -> route('admin.user.index');
        } catch (ModelNotFoundException $ex) {
            Session::flash(trans('user.danger'), trans('user.editfail'));
            return redirect() -> route('admin.user.index');
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
            $count = User::findOrFail($id)->borrows()->where('quantity', '<>', 0)->count();
            if ($count == 0) {
                $result = User::destroy($id);
                if ($result) {
                    Session::flash(trans('user.success'), trans('user.delete_success'));
                } else {
                    Session::flash(trans('user.danger'), trans('user.delete_fail'));
                }
            } else {
                Session::flash(trans('user.danger'), trans('user.delete_fail'));
            }
            return redirect() -> route('admin.user.index');
        } catch (ModelNotFoundException $ex) {
            Session::flash(trans('user.danger'), trans('user.delete_find'));
            return redirect() -> route('admin.user.index');
        }
    }
}
