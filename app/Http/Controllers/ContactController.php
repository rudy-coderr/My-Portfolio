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

            $response = Http::withHeaders([
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

                'subject' => $request->subject,

                'htmlContent' => "
                    <h2>New Contact Form Message</h2>

                    <p><strong>Name:</strong> {$request->name}</p>

                    <p><strong>Email:</strong> {$request->email}</p>

                    <p><strong>Subject:</strong> {$request->subject}</p>

                    <p><strong>Message:</strong></p>

                    <p>{$request->message}</p>
                ",
            ]);

            if ($response->successful()) {
                return back()->with('success', 'Your message has been sent successfully!');
            }

            return back()->with(
                'error',
                'Failed to send message. Brevo Response: ' . $response->body()
            );

        } catch (Throwable $e) {

            dd([
                'ERROR' => $e->getMessage(),
                'CLASS' => get_class($e),
                'FILE'  => $e->getFile(),
                'LINE'  => $e->getLine(),
            ]);

        }
    }
}