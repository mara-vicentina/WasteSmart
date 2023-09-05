<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;

class StateController extends Controller
{
    public function getStates(Request $request)
    {
        $states = State::orderBy('uf', 'asc')->get();
        return $states;
    }
}
