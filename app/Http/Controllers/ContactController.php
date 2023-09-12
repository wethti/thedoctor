<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function index()
    {
        return view('contacts');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Send email
        $recipientEmail = 'dpo120000@gmail.com';
        Mail::to($recipientEmail)->send(new ContactFormMail($request->all()));

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
