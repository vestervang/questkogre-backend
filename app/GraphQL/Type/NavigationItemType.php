<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class NavigationItemType extends BaseType
{
    protected $attributes = [
        'name'        => 'NavigationItemType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id'       => [
                'type'        => Type::nonNull(Type::int()),
                'description' => 'The id of the navigation item',
            ],
            'text'     => [
                'type'        => Type::string(),
                'description' => 'Text to show on the navigation item'
            ],
            'link'     => [
                'type'        => Type::string(),
                'description' => 'Link for the navigation item'
            ],
            'children' => [
                'type'        => Type::listOf(GraphQL::type('navigation_item')),
                'description' => 'Children of the current navigation item'
            ]
        ];
    }
}
