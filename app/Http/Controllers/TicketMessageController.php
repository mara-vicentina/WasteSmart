<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Models\TicketsMessage;
use App\Models\User;
use Illuminate\Support\Facades\URL;
use Redirect;
use DateTime;

class TicketMessageController extends Controller
{
    public function create(Request $request)
    {
        $ticketsMessage = new TicketsMessage();
        $ticketsMessage->message        = $request->message;
        $ticketsMessage->user_id        = Auth::user()->id;
        $ticketsMessage->ticket_id      = $request->id;
        $ticketsMessage->save();

        $allTicketMessages = TicketsMessage::where('ticket_id', $request->id)
        ->orderBy('created_at', 'asc')
        ->get();

        foreach($allTicketMessages as $message) {
            $message->created_at_formated = (new DateTime($message->created_at))->format('d/m/Y H:i:s');
            $message->user_name = User::whereId($message->user_id)->first()->name;
        }

        return [
            'success'  => true,
            'messages' => $allTicketMessages
        ];
    }
}
