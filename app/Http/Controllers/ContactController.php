<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\HealetMail;

class ContactController extends Controller
{
    /**
     * Show the contact form.
     *
     * @return \Illuminate\View\View
     */
    public function showForm()
    {
        return view('mails.contact');
    }

    /**
     * Handle the form submission.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // Send the email
        Mail::to('engolakotb154@gmail.com')->send(new HealetMail($validatedData));

        return back()->with('success', 'Thank you for your message. We will get back to you soon!');
    }
}
