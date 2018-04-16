<?php

namespace App\GraphQL\Query;

use App\Circus;
use Carbon\Carbon;
use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

class CircusesQuery extends Query
{
    protected $attributes = [
        'name' => 'CircusesQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('circus'));
    }

    public function args()
    {
        return [
            'current' => [
                'type' => Type::boolean(),
                'description' => 'Get the current location of the circus.'
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if(isset($args['current']) && $args['current'] === true){
            //Find the date for the next wednesday
            $time = new Carbon('last Wednesday');

            $weekNumber = $time->copy()->weekOfYear;

            //Find the right circus location based on the next wednesday.
            $circusLocation = $weekNumber % 12;

            return Circus::where('id' , $circusLocation)->get();
        }

        return Circus::all();
    }
}
