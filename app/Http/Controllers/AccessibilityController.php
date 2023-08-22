<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccessibilityController extends Controller
{
    public function index()
    {
        return view('painel/accessibility/index', [
            'currentPage' => 'accessibility',
        ]);
    }
}
