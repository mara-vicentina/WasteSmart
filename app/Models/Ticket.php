<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Auth;

class Ticket extends Model
{
    use HasFactory;

    public static function getTicketCountBySector($sector, $cityId = null)
    {
        info([$cityId, $sector]);
        return self::where('sector', $sector)
            ->where('user_id', Auth::user()->id)
            ->when(!is_null($cityId), function (Builder $query) use ($cityId) {
                $query->where('city_id', $cityId);
            })
            ->count();
    }

    public static function getTicketCountBySituation($situation, $cityId = null)
    {
        info([$cityId, $situation]);
        return self::where('situation', $situation)
            ->where('user_id', Auth::user()->id)
            ->when(!is_null($cityId), function (Builder $query) use ($cityId) {
                $query->where('city_id', $cityId);
            })
            ->count();
    }

    public static function getTicketCountBySectorAdmin($sector, $cityId = null)
    {
        info([$cityId, $sector]);
        return self::where('sector', $sector)
            ->count();
    }

    public static function getTicketCountBySituationAdmin($situation, $cityId = null)
    {
        info([$cityId, $situation]);
        return self::where('situation', $situation)
            ->count();
    }
}
