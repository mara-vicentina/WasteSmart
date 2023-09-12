<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\City;
use Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $userCity = City::whereId(Auth::user()->city_id)->first();

        return view('painel/dashboard/index', [
            'currentPage'        => 'dashboard',
            'aberto'             => Ticket::getTicketCountBySituation('Aberto'),
            'andamento'          => Ticket::getTicketCountBySituation('Em Andamento'),
            'fechado'            => Ticket::getTicketCountBySituation('Fechado'),
            'setorInfra'         => Ticket::getTicketCountBySector('Infraestrutura'),
            'setorAccessi'       => Ticket::getTicketCountBySector('Acessibilidade'),
            'setorPublic'        => Ticket::getTicketCountBySector('Iluminação Pública'),
            'setorTraffic'       => Ticket::getTicketCountBySector('Trânsito e Segurança'),
            'cityAberto'         => Ticket::getTicketCountBySituation('Aberto', $userCity->id),
            'cityAndamento'      => Ticket::getTicketCountBySituation('Em Andamento', $userCity->id),
            'cityFechado'        => Ticket::getTicketCountBySituation('Fechado', $userCity->id),
            'citySetorInfra'     => Ticket::getTicketCountBySector('Infraestrutura', $userCity->id),
            'citySetorAccessi'   => Ticket::getTicketCountBySector('Acessibilidade', $userCity->id),
            'citySetorPublic'    => Ticket::getTicketCountBySector('Iluminação Pública', $userCity->id),
            'citySetorTraffic'   => Ticket::getTicketCountBySector('Trânsito e Segurança', $userCity->id),
            'userCityName'       => $userCity->name,
        ]);
    }

    public function indexAdmin()
    {
        return view('painel/dashboard/index-admin', [
            'currentPage'  => 'dashboard',
            'aberto'       => Ticket::getTicketCountBySituationAdmin('Aberto'),
            'andamento'    => Ticket::getTicketCountBySituationAdmin('Em Andamento'),
            'fechado'      => Ticket::getTicketCountBySituationAdmin('Fechado'),
            'setorInfra'   => Ticket::getTicketCountBySectorAdmin('Infraestrutura'),
            'setorAccessi' => Ticket::getTicketCountBySectorAdmin('Acessibilidade'),
            'setorPublic'  => Ticket::getTicketCountBySectorAdmin('Iluminação Pública'),
            'setorTraffic' => Ticket::getTicketCountBySectorAdmin('Trânsito e Segurança'),
        ]);
    }

    private function getTicketCountBySectori($sector)
    {
        return Ticket::where('sector', $sector)
            ->where('user_id', Auth::user()->id)
            ->count();
    }

    private function getTicketCountBySituationi($situation)
    {
        return Ticket::where('situation', $situation)
            ->where('user_id', Auth::user()->id)
            ->count();
    }
}
