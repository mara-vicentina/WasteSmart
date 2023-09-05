<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('painel/dashboard/index', [
            'currentPage' => 'dashboard',
        ]);
    }

    public function indexAdmin()
    {
        return view('painel/dashboard/index-admin', [
            'currentPage' => 'dashboard',
        ]);
    }
}
