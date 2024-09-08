<?php
namespace App\Http\Controllers;

use App\Mail\SubscriptionConfirmation;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        // Validate the email input
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        // Store the email in the subscribers table
        $subscriber = Subscriber::create([
            'email' => $request->input('email'),
        ]);

        // Send confirmation email with unsubscribe link
        Mail::to($subscriber->email)->send(new SubscriptionConfirmation($subscriber->email));

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Thank you for subscribing! A confirmation email has been sent to your inbox.');
    }

    public function unsubscribe($email)
    {
        // Find the subscriber by email
        $subscriber = Subscriber::where('email', $email)->first();

        if ($subscriber) {
            // Delete the subscriber from the database
            $subscriber->delete();

            return redirect('/')->with('success', 'You have successfully unsubscribed from our newsletter.');
        }

        return redirect('/')->with('error', 'This email is not subscribed to our newsletter.');
    }
}
