<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'privacy_policy' => 'accepted',
            'recipient_email' => 'required|string|max:40',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with([
                    'status' => 'error'
                ]);
        }

        $emailData = $request->only('first_name', 'last_name', 'phone', 'email');

        $recipientEmail = $validator['recipient_email'];

        try {
            Mail::to($recipientEmail)->send(new ContactMail($emailData));

            // Set session status to 'success'
            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'Ваше сообщение успешно отправлено!',
            ]);
        } catch (\Exception $e) {
            // Handle any errors during email sending
            return redirect()->back()->with([
                'status' => 'error'
            ]);
        }
    }

}
