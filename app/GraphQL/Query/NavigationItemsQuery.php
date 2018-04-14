<?php

namespace App\GraphQL\Query;

use App\NavigationItem;
use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

class NavigationItemsQuery extends Query
{
    protected $attributes = [
        'name' => 'NavigationItemsQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('navigation_item'));
    }

    public function args()
    {
        return [
            'id' => [
                'type' => Type::int()
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        return NavigationItem::whereNull('parent_id')->get();
    }
}
