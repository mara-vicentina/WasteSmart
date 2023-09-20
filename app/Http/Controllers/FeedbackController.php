<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Ticket;
use Auth;
use Validator;
use Redirect;

class FeedbackController extends Controller
{
    public function create(Request $request)
    {
        info($request->all());
        $feedback = new Feedback();
        $feedback->evaluation         = $request->evaluation;
        $feedback->feedback_message   = $request->feedback_message;
        $feedback->ticket_id  = $request->ticket_id;
        $feedback->save();

        return [
            'success' => true,
        ];
    }

    public function get($ticketId)
    {
        $feedback = Feedback::where('ticket_id', $ticketId)->first();

        return [
            'success' => true,
            'feedback' => $feedback,
        ];
    }

    public function remove(Request $request)
    {
        Feedback::where('id', $request->feedback_id)->delete();
        return [
            'success' => true,
        ];
    }
}
