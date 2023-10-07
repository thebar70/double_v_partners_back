<?php

namespace App\Actions;

use App\Models\Ticket;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ListTicketsAction
{
    public function __invoke(int $number_of_tasks_per_page = 0, array $relations = []): LengthAwarePaginator
    {
        return Ticket::with($relations)->paginate($number_of_tasks_per_page);
    }
}
