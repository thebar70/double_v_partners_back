<?php

namespace App\Http\Resources;

use App\Enums\ModelsRelations\TicketRelationsEnum;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'uuid' => $this->uuid,
            'description' => $this->description,
            'status' => $this->status,
            'created_at' => $this->created_at->diffForHumans(),
            'updated_at' => $this->updated_at->diffForHumans(),
            'tickets_comments' => $this->when(
                $this->relationLoaded(TicketRelationsEnum::TICKET_COMMENTS->value),
                $this->ticketsComments ?? []
            ),
            'user' => $this->when(
                $this->relationLoaded(TicketRelationsEnum::USER->value),
                $this->user
            )
        ];

        return $data;
    }
}
