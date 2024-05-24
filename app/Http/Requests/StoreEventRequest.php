<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'location' => 'nullable|string',
            'datetime' => 'nullable|date|date_format:Y-m-d H:i',
            'sport_id' => 'required|integer:exists:sports,id',
            'arena_id' => 'required|integer:exists:arenas,id'
        ];
    }
}
