<?php
/**
 * Created by PhpStorm.
 * User: frederikthomsen
 * Date: 4/2/18
 * Time: 2:28 PM
 */

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType{
	
	protected $attributes = [
		'name' => 'User',
		'description' => 'A user'
	];
	
	/*
	* Uncomment following line to make the type input object.
	* http://graphql.org/learn/schema/#input-types
	*/
	// protected $inputObject = true;
	
	public function fields(){
		return [
			'id' => [
				'type' => Type::nonNull(Type::string()),
				'description' => 'The id of the user'
			],
			'email' => [
				'type' => Type::string(),
				'description' => 'The email of user'
			],
            'username' => [
                'type' => Type::string(),
                'description' => 'The username of the user'
            ],
            'runescape_name' => [
                'type' => Type::string(),
                'description' => 'The runescape name of the user'
            ],
            'member' => [
                'type' => Type::boolean(),
                'description' => 'The membership status of the user'
            ],
		];
	}
	
	// If you want to resolve the field yourself, you can declare a method
	// with the following format resolve[FIELD_NAME]Field()
	protected function resolveEmailField($root, $args){
		return strtolower($root->email);
	}
}