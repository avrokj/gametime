<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGameRequest extends FormRequest
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
            'event_id' => 'nullable|exists:events,id',
            'home_team_id' => 'required|exists:teams,id',
            'away_team_id' => 'required|exists:teams,id',
            'home_score' => 'nullable|integer|max:200',
            'away_score' => 'nullable|integer|max:200',
            'sb_id' => 'nullable|integer',
            'status' => 'nullable|integer|max:11',
            'datetime' => 'nullable|date|date_format:Y-m-d H:i'
        ];
    }
}
