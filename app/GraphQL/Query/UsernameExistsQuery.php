<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\User;
use Illuminate\Validation\Validator;

class UsernameExistsQuery extends Query
{
    protected $attributes = [
        'name' => 'UsernameExistsQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::boolean();
    }

    public function args()
    {
        return [
            'username' => [
                'type' => Type::nonNull(Type::string())
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $user = User::where('username', $args['username'])->first();

        if($user){
            return true;
        }

        return false;
    }
}
