<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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

    // EMAIL 1: Send inquiry to you
    $adminEmail = Http::withHeaders([
        'accept'       => 'application/json',
        'api-key'      => env('BREVO_API_KEY'),
        'content-type' => 'application/json',
    ])->post('https://api.brevo.com/v3/smtp/email', [

        'sender' => [
            'name'  => 'Rudy Portfolio',
            'email' => 'boringotrudy8@gmail.com',
        ],

        'to' => [
            [
                'email' => 'boringotrudy8@gmail.com',
                'name'  => 'Rudy',
            ]
        ],

        'replyTo' => [
            'email' => $request->email,
            'name'  => $request->name,
        ],

        'subject' => 'New Inquiry: '.$request->subject,

        'htmlContent' => "
            <h2>New Contact Form Message</h2>

            <p><strong>Name:</strong> {$request->name}</p>

            <p><strong>Email:</strong> {$request->email}</p>

            <p><strong>Subject:</strong> {$request->subject}</p>

            <p><strong>Message:</strong></p>

            <p>{$request->message}</p>
        ",
    ]);



    // EMAIL 2: Confirmation email to sender
    $userEmail = Http::withHeaders([
        'accept'       => 'application/json',
        'api-key'      => env('BREVO_API_KEY'),
        'content-type' => 'application/json',
    ])->post('https://api.brevo.com/v3/smtp/email', [

        'sender' => [
            'name'  => 'Rudy Portfolio',
            'email' => 'boringotrudy8@gmail.com',
        ],

        'to' => [
            [
                'email' => $request->email,
                'name'  => $request->name,
            ]
        ],

        'subject' => 'Thank you for contacting Rudy Portfolio',

        'htmlContent' => "
            <h2>Hello {$request->name},</h2>

            <p>Thank you for reaching out!</p>

            <p>I have received your message and will get back to you as soon as possible.</p>

            <hr>

            <h3>Your Message:</h3>

            <p><strong>Subject:</strong> {$request->subject}</p>

            <p>{$request->message}</p>

            <br>

            <p>Regards,</p>
            <p><strong>Rudy</strong></p>
        ",
    ]);


    if ($adminEmail->successful() && $userEmail->successful()) {

        return back()->with(
            'success',
            'Your message has been sent successfully!'
        );

    }


    return back()->with(
        'error',
        'Email sending failed.'
    );


} catch (Throwable $e) {

    dd([
        'ERROR' => $e->getMessage(),
        'FILE'  => $e->getFile(),
        'LINE'  => $e->getLine(),
    ]);

}
    }
}