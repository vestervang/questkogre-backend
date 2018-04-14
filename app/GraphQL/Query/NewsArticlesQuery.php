<?php

namespace App\GraphQL\Query;

use App\NewsArticle;
use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

class NewsArticlesQuery extends Query
{
    protected $attributes = [
        'name'        => 'NewsArticlesQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return GraphQL::pagination(GraphQL::type('news_article'));
    }

    public function args()
    {
        return [
            'page'  => [
                'type' => Type::int(),
            ],
            'limit' => [
                'type' => Type::int(),
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        return NewsArticle::paginate($args['limit'] ?? 10, ['*'], 'page', $args['page'] ?? 0);
    }
}
