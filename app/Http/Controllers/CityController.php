<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function getCities($uf)
    {
        $cities = City::where('uf', $uf)
            ->orderBy('name', 'asc')
            ->get();

        return $cities;
    }
}
