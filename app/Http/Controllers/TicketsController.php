<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketsMessage;
use App\Models\User;
use Auth;
use Validator;
use Redirect;
use Illuminate\Support\Facades\URL;
use DateTime;

class TicketsController extends Controller
{
    public function create(Request $request)
    {
        info($request->all());
        $validator = Validator::make($request->all(), [
            'sector'               => ['required', 'string'],
            'subject'              => ['required', 'string'],
            'message'              => ['required', 'string'],
            'cep'                  => ['required', 'string', 'max:8'],
            'street'               => ['required', 'string'],
            'number'               => ['required', 'numeric', 'max_digits:10'],
            'complement'           => ['required', 'string'],
            'neighborhood'         => ['required', 'string'],
            'city'                 => ['required', 'string'],
            'state'                => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect('/?open_create_modal_ticket=true')->with('errors', $validator->messages());
        };

        $ticket = new Ticket();
        $ticket->sector        = $request->sector;
        $ticket->subject       = $request->subject;
        $ticket->cep           = $request->cep;
        $ticket->street        = $request->street;
        $ticket->number        = $request->number;
        $ticket->complement    = $request->complement;
        $ticket->neighborhood  = $request->neighborhood;
        $ticket->city_id       = $request->city;
        $ticket->situation     = "Aberto";
        $ticket->user_id       = Auth::user()->id;
        $ticket->save();

        $ticketsMessage = new TicketsMessage();
        $ticketsMessage->message        = $request->message;
        $ticketsMessage->user_id        = Auth::user()->id;
        $ticketsMessage->ticket_id      = $ticket->id;
        $ticketsMessage->save();

        $urlAnterior = URL::previous();
        return Redirect::to($urlAnterior);
    }

    public function getTicket($id)
    {
        $ticket = Ticket::whereId($id)->first();

        $ticket->messages = TicketsMessage::where('ticket_id', $id)
            ->orderBy('created_at', 'asc')
            ->get();

        foreach($ticket->messages as $message) {
            $message->created_at_formated = (new DateTime($message->created_at))->format('d/m/Y H:i:s');
            $message->user_name = User::whereId($message->user_id)->first()->name;
        }

        return $ticket;
    }

    public function remove(Request $request)
    {
        TicketsMessage::where('ticket_id', $request->id)->delete();
        Ticket::where('id', $request->id)->delete();

        $urlAnterior = URL::previous();
        return Redirect::to($urlAnterior);
    }
}
