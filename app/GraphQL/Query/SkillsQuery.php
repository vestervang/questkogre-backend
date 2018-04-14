<?php

namespace App\GraphQL\Query;

use App\Skill;
use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

class SkillsQuery extends Query
{
    protected $attributes = [
        'name'        => 'SkillsQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('skill'));
    }

    public function args()
    {
        return [
            'id'   => [
                'name' => 'id',
                'type' => Type::string()
            ],
            'name' => [
                'name' => 'name',
                'type' => Type::string()
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        if (isset($args['id'])) {
            return Skill::where('id', $args['id'])->get();
        } else {
            if (isset($args['email'])) {
                return Skill::where('name', $args['name'])->get();
            } else {
                return Skill::all();
            }
        }
    }
}
