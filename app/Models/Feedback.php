<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedback';

    public static function getFeedbackByEvaluationAdmin($evaluation, $sector = null)
    {
        return self::where('evaluation', $evaluation)
           ->count();

        // return DB::table('feedback f')
        //     ->join('tickets t', 't.id', 'f.ticket_id')
        //     ->where('f.evalution', $evaluation)
        //     ->when(!is_null($sector), function (Builder $query) use ($sector) {
        //         $query->where('t.sector', $sector);
        //     })
        //     ->count();
    }

}
