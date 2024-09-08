<?php

namespace App\Http\Controllers;

use App\Models\PollOption;
use Illuminate\Http\Request;

class PollController extends Controller
{
    public function vote(Request $request)
    {
        // Validate the request
        $request->validate([
            'poll_option' => 'required|exists:poll_options,id'
        ]);

        // Find the selected poll option and increment its vote count
        $pollOption = PollOption::findOrFail($request->poll_option);
        $pollOption->increment('votes');

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Thank you for your vote!');
    }
}
