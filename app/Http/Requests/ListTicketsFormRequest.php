<?php

namespace App\Http\Requests;

use App\Enums\ModelsRelations\TicketRelationsEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class ListTicketsFormRequest extends FormRequest
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
            'number_per_page' => [
                'integer'
            ],
            'relations.*' => [new Enum(TicketRelationsEnum::class)]
        ];
    }
}
