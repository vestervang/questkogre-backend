<?php

namespace App\GraphQL\Type;

use Carbon\Carbon;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class CircusType extends BaseType
{
    protected $attributes = [
        'name'        => 'CircusType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id'             => [
                'type'        => Type::nonNull(Type::int()),
                'description' => 'The id of the circus',
            ],
            'location'       => [
                'type'        => Type::string(),
                'description' => 'Location of the circus'
            ],
            'image'          => [
                'type'        => Type::string(),
                'description' => 'Image of the circus location',
            ],
            'last_wednesday' => [
                'type'        => Type::string(),
                'description' => 'Date of last wednesday',
            ],
            'next_wednesday' => [
                'type'        => Type::string(),
                'description' => 'Date of next wednesday',
            ]
        ];
    }

    protected function resolveLastWednesdayField($root, $args)
    {
        $time = new Carbon('last Wednesday');

        return $time->timestamp;
    }

    protected function resolveNextWednesdayField($root, $args)
    {
        $time = new Carbon('next Wednesday');

        return $time->timestamp;
    }

    protected function resolveImageField($root, $args){
        return url($root->image);
    }
}
