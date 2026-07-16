<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Log;
use Throwable;

class ContactController extends Controller
{
   public function send(Request $request)
{
    $request->validate([
        'name'    => 'required|string|max:255',
        'email'   => 'required|email',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    try {
        Mail::to('boringotr@gmail.com')->send(
            new ContactMail($request->all())
        );

        return back()->with('success', 'Your message has been sent successfully!');
    } catch (Throwable $e) {
        Log::error('MAIL ERROR: '.$e->getMessage());

        return back()->with('error', $e->getMessage());
    }
}
}