<?php
/**
 * Created by PhpStorm.
 * User: frederikthomsen
 * Date: 6/4/18
 * Time: 9:28 PM
 */

namespace App\GraphQL\Queries;

use Carbon\Carbon;
use App\Models\Circus;

class CircusQuery
{
    public function current($root, array $args)
    {
        //Find the date for the next wednesday
        $time = new Carbon('last Wednesday');

        $weekNumber = $time->copy()->weekOfYear;

        //Find the right circus location based on the next wednesday.
        $circusLocation = $weekNumber % 12;

        return Circus::find($circusLocation);
    }
}