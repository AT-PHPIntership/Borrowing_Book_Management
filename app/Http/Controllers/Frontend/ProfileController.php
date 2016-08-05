<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Requests;
use App\Http\Requests\UserUpdateProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Session;
use Exception;
use Hash;

class ProfileController extends Controller
{
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
            $data['image'] = $img;
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
     * View the form for user update password.
     *
     * @return \Illuminate\Http\Response
     */
    public function getChangePassword()
    {
        return view('frontend.auth.password.change');
    }

    /**
     * Update password for user.
     *
     * @param \Illuminate\Http\Request $request PasswordRequest
     * @param int                      $id      userId
     *
     * @return \Illuminate\Http\Response
     */
    public function changePassword(PasswordRequest $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            if (Hash::check($request->current_password, $user->password)) {
                $user->password= bcrypt($request->password);
                $user->save();
                Session::flash(trans('user.success'), trans('user.successful_message'));
                return redirect()->route('/');
            } else {
                Session::flash(trans('user.danger'), trans('user.error_password_incorrect'));
                return redirect()->back();
            }
        } catch (Exception $saveException) {
            Session::flash(trans('user.danger'), trans('user.error_message'));
            return redirect()->back();
        }
    }
}
