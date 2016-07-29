<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use Session;
use Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getContact()
    {
        return view('frontend.contact');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function postContact(ContactRequest $request)
    {
        $data = array(
            'yourname' => $request->yourname,
            'email' => $request->email,
            'company' => $request->company,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
            );

        $result = Mail::send('frontend.emails.email', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->to(config('define.mail'));
            $message->subject($data['subject']);
        });
        if ($result) {
            Session::flash('success', trans('front_end.send_success'));
            return redirect()->route('contact');
        } else {
            Session::flash('danger', trans('front_end.send_unsuccess'));
            return redirect()->route('contact');
        }
    }
}
