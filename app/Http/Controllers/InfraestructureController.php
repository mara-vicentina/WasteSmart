<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfraestructureController extends Controller
{
    public function index()
    {
        return view('painel/infraestructure/index', [
            'currentPage' => 'infraestructure',
        ]);
    }
}
