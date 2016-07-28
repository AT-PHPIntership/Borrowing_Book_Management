<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Requests;
use App\Http\Requests\UserUpdateProfileRequest;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Session;
use Exception;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $user = User::findOrFail($id);
            return view('frontend.profile.show', compact('user'));
        } catch (Exception $ex) {
            Session::flash('danger', trans('front_end.noid'));
            return redirect()->route('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id userId
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $users = User::findOrFail($id);
            return  view('frontend.profile.edit', compact('users'));
        } catch (ModelNotFoundException $e) {
            Session::flash(trans('user.danger'), trans('user.editfind'));
            return redirect() -> route('profile.show', $id);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param int                      $id      userId
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateProfileRequest $request, $id)
    {
        $data = $request->all();
        if ($request -> hasFile('image')) {
            $img = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image') -> move(config('path.upload_user'), $img);
        }
        try {
            $users = User::findOrFail($id);
            $users -> update($data);
            Session::flash(trans('user.success'), trans('user.editsuccess'));
            return redirect()->route('profile.show', $id);
        } catch (ModelNotFoundException $ex) {
            Session::flash(trans('user.danger'), trans('user.editfail'));
            return redirect()->route('profile.show', $id);
        }
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
