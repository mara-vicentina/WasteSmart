<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\City;
use App\Models\TicketsMessage;
use App\Models\Feedback;
use Auth;

class TrafficSecurityController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('sector', 'Trânsito e Segurança')
            ->where('user_id', Auth::user()->id)
            ->get();

        foreach ($tickets as $ticket) {
            $city = City::whereId($ticket->city_id)->first();
            
            $ticket->city_name = $city->name;
            $ticket->uf        = $city->uf;
            $ticket->json_data = $ticket->toJson();
            $ticket->haveFeedback = is_null(Feedback::where('ticket_id', $ticket->id)->first()) ? false : true;
        }

        return view('painel/traffic-security/index', [
            'currentPage' => 'traffic-security',
            'tickets'     => $tickets,
        ]);
    }

    public function indexAdmin()
    {
        $tickets = Ticket::where('sector', 'Trânsito e Segurança')->get();

        foreach ($tickets as $ticket) {
            $city = City::whereId($ticket->city_id)->first();
            
            $ticket->city_name = $city->name;
            $ticket->uf        = $city->uf;
            $ticket->json_data = $ticket->toJson();
            $ticket->haveFeedback = is_null(Feedback::where('ticket_id', $ticket->id)->first()) ? false : true;
        }

        return view('painel/traffic-security/index-admin', [
            'currentPage' => 'traffic-security',
            'tickets'     => $tickets,
        ]);
    }
}
