<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketsMessage;
use App\Models\City;
use Auth;

class PublicLightingController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('sector', 'Iluminação Pública')
            ->where('user_id', Auth::user()->id)
            ->get();

        foreach ($tickets as $ticket) {
            $city = City::whereId($ticket->city_id)->first();
            
            $ticket->city_name = $city->name;
            $ticket->uf        = $city->uf;
            $ticket->json_data = $ticket->toJson();
        }

        return view('painel/public-lighting/index', [
            'currentPage' => 'public-lighting',
            'tickets'     => $tickets,
        ]);
    }

    public function indexAdmin()
    {
        $tickets = Ticket::where('sector', 'Iluminação Pública')->get();

        foreach ($tickets as $ticket) {
            $city = City::whereId($ticket->city_id)->first();
            
            $ticket->city_name = $city->name;
            $ticket->uf        = $city->uf;
            $ticket->json_data = $ticket->toJson();
        }

        return view('painel/public-lighting/index-admin', [
            'currentPage' => 'public-lighting',
            'tickets'     => $tickets,
        ]);
    }
}
