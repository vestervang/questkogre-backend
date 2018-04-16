<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\User;

class EmailExistsQuery extends Query
{
    protected $attributes = [
        'name' => 'EmailExistsQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::boolean();
    }

    public function args()
    {
        return [
            'email' => [
                'type' => Type::nonNull(Type::string())
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $user = User::where('email', $args['email'])->first();

        if($user){
            return true;
        }

        return false;
    }
}
