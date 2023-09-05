<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\City;
use App\Models\TicketsMessage;

class AccessibilityController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('sector', 'Acessibilidade')->get();

        foreach ($tickets as $ticket) {
            $city = City::whereId($ticket->city_id)->first();
            
            $ticket->city_name = $city->name;
            $ticket->uf        = $city->uf;
            $ticket->json_data = $ticket->toJson();
        }

        return view('painel/accessibility/index', [
            'currentPage' => 'accessibility',
            'tickets'     => $tickets,
        ]);
    }

    public function indexAdmin()
    {
        $tickets = Ticket::where('sector', 'Acessibilidade')->get();

        foreach ($tickets as $ticket) {
            // $ticket->first_message   = TicketsMessage::where('ticket_id', $ticket->id)->first()->message;
            $ticket->json_data       = $ticket->toJson();
        }

        return view('painel/accessibility/index-admin', [
            'currentPage' => 'accessibility',
            'tickets'     => $tickets,
        ]);
    }
}
