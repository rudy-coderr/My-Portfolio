<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {
            Mail::to('boringotr@gmail.com')->send(
                new ContactMail($request->only([
                    'name',
                    'email',
                    'subject',
                    'message'
                ]))
            );

            return back()->with('success', 'Your message has been sent successfully!');
        } catch (Throwable $e) {

            Log::error('MAIL ERROR', [
                'message' => $e->getMessage(),
                'file'    => $e->getFile(),
                'line'    => $e->getLine(),
                'trace'   => $e->getTraceAsString(),
            ]);

            return back()->with('error', 'Failed to send message. Please try again later.');
        }
    }
}