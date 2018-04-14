<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class SkillType extends BaseType
{
    protected $attributes = [
        'name'        => 'SkillType',
        'description' => 'A type'
    ];

    public function fields()
    {
        return [
            'id'        => [
                'type' => Type::nonNull(Type::int()),
            ],
            'name'      => [
                'type'        => Type::string(),
                'description' => 'Name of the skill'
            ],
            'max_level' => [
                'type'        => Type::int(),
                'description' => 'Max level of the skill'
            ],
            'member'    => [
                'type'        => Type::boolean(),
                'description' => 'Is the skill members only'
            ],
            'icon_s'    => [
                'type'        => Type::string(),
                'description' => 'Small icon for the skill',
            ],
            'icon_b'    => [
                'type'        => Type::string(),
                'description' => 'Big icon for the skill'
            ],
            'thumbnail' => [
                'type'        => Type::string(),
                'description' => 'Thumbnail for the skill',
            ]
        ];
    }

    protected function resolveIconSField($root, $args)
    {
        return url($root->icon_s);
    }

    protected function resolveIconBField($root, $args)
    {
        return url($root->icon_b);
    }

    protected function resolveThumbnailField($root, $args)
    {
        return url($root->thumbnail);
    }

}
