<?php

namespace App\Http\Controllers\Site\Email;

use App\Http\Controllers\Controller;
use App\Mail\Contact as MailContact;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HelpController extends Controller
{
    /**
     * Show the form for sending a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function send(Request $request)
    {

        $validation = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'subject' => 'required|max:255',
            'msg' => 'required',
        ]);

        $contact = Contact::create($request->all());
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new MailContact($contact));
        return redirect()->back()->with('helpCreate', '1');
    }
}
