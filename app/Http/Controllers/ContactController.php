<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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

        /*
        |--------------------------------------------------------------------------
        | DEBUG (Temporary)
        |--------------------------------------------------------------------------
        | Uncomment this block to verify if Render can reach Brevo via HTTPS.
        | Remove it after testing.
        |
        */

        /*
        try {
            $response = Http::timeout(10)
                ->withHeaders([
                    'api-key' => env('BREVO_API_KEY', ''),
                ])
                ->get('https://api.brevo.com/v3/account');

            dd([
                'PHP_VERSION'      => PHP_VERSION,
                'OPENSSL_LOADED'   => extension_loaded('openssl'),
                'OPENSSL_VERSION'  => defined('OPENSSL_VERSION_TEXT')
                    ? OPENSSL_VERSION_TEXT
                    : 'Unavailable',
                'HTTP_STATUS'      => $response->status(),
                'HTTP_BODY'        => $response->body(),
            ]);
        } catch (Throwable $e) {
            dd([
                'ERROR' => $e->getMessage(),
            ]);
        }
        */

        try {

            Mail::to('boringotrudy8@gmail.com')->send(
                new ContactMail([
                    'name'    => $request->name,
                    'email'   => $request->email,
                    'subject' => $request->subject,
                    'message' => $request->message,
                ])
            );

            return back()->with(
                'success',
                'Your message has been sent successfully!'
            );

        } catch (Throwable $e) {

            dd([
                'ERROR'     => $e->getMessage(),
                'CLASS'     => get_class($e),
                'PREVIOUS'  => $e->getPrevious()?->getMessage(),
                'FILE'      => $e->getFile(),
                'LINE'      => $e->getLine(),

                'MAILER'    => config('mail.default'),
                'HOST'      => config('mail.mailers.smtp.host'),
                'PORT'      => config('mail.mailers.smtp.port'),
                'USERNAME'  => config('mail.mailers.smtp.username'),
                'ENCRYPTION'=> config('mail.mailers.smtp.scheme'),
            ]);
        }
    }
}