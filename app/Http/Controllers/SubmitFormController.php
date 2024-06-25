<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubmitFormController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'subject' => ['required', 'string', 'max:100'],
            'body' => ['required', 'string',],
        ]);

        Mail::to('test@example.com')
            ->send(new SendEmail($data));

        session()->flash('success', 'Email sent successfully!');

        return back();
    }
}
