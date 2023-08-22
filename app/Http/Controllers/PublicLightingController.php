<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublicLightingController extends Controller
{
    public function index()
    {
        return view('painel/public-lighting/index', [
            'currentPage' => 'public-lighting',
        ]);
    }
}
