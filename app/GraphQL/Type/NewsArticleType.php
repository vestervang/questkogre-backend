<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class NewsArticleType extends BaseType
{
    protected $attributes = [
        'name'        => 'NewsArticleType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'headline'   => [
                'type'        => Type::nonNull(Type::string()),
                'description' => 'The id of the user'
            ],
            'slug'       => [
                'type'        => Type::nonNull(Type::string()),
                'description' => 'The id of the user'
            ],
            'article'    => [
                'type'        => Type::nonNull(Type::string()),
                'description' => 'The id of the user'
            ],
            'created_at' => [
                'type'        => Type::nonNull(Type::string()),
                'description' => 'The id of the user'
            ],
            'author'     => [
                'type'        => GraphQL::type('user'),
                'description' => 'Author of the news article'
            ]
        ];
    }

    protected function resolveCreatedAtField($root, $args)
    {
        return $root->created_at->toDateTimeString();
    }

    protected function resolveAuthorField($root, $args)
    {
        return $root->author;
    }
}
