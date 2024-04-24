<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
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
            'event_name' => 'required|string',
            'location' => 'nullable|exists:teams,id',
            'datetime' => 'nullable|exists:teams,id',
            'sport_id' => 'required|exists:sports,id',
            'game_id' => 'required|exists:games,id',
            'arena_id' => 'required|integer:exists:arenas,id'
        ];
    }
}
