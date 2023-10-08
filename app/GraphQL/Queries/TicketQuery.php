<?php

namespace App\GraphQL\Queries;

use App\Models\Ticket;

use Closure;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;

class TicketQuery extends Query
{

    protected $attributes = [
        'name' => 'getTickes'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Ticket'));
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id', 
                'type' => Type::string(),
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $info, SelectFields $fields)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        $ticket = Ticket::select($select)->with($with);

        return $ticket->get();
    }
}
