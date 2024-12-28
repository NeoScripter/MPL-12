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
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'privacy_policy' => 'accepted',
            'recipient_email' => 'nullable|email',
        ]);

        // Collect form data for the email
        $emailData = $request->only('first_name', 'last_name', 'phone', 'email');

        // Determine recipient email with a fallback to a default
        $recipientEmail = $validated['recipient_email'] ?? 'admin@mospsylab.ru';

        try {
            Mail::to($recipientEmail)->send(new ContactMail($emailData));

            // Set session status to 'success'
            return redirect()->back()->with([
                'status' => 'success',
            ]);
        } catch (\Exception $e) {
            // Handle any errors during email sending
            return redirect()->back()->with([
                'status' => 'error'
            ]);
        }
    }

}
