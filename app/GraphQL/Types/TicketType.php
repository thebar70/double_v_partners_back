<?php

namespace App\GraphQL\Types;

use App\Models\Ticket;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class TicketType extends GraphQLType
{

    protected $attributes = [
        'name' => 'Ticket',
        'description' => 'Object type of the Ticket',
        'model' => Ticket::class,

    ];

    public function fields(): array
    {
        return [
            'uuid' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Id of ticket',
            ],
            'description' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Ticket description',
            ],
            'status' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Ticket status',
            ],
            'created_at' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Ticket created at',
            ]
        ];
    }
}
