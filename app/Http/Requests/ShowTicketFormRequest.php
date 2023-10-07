<?php

namespace App\Http\Requests;

use App\Enums\ModelsRelations\TicketRelationsEnum;
use App\Enums\TicketStatusEnum;
use App\Models\Ticket;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class ShowTicketFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'uuid' => [
                'exist:tickets'
            ],
            'relations.*' => [new Enum(TicketRelationsEnum::class)]
        ];
    }
}
