<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Traits\GameTurnApiResponseTrait;

class GameTurnRequest extends FormRequest
{
    use GameTurnApiResponseTrait;

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
            "players" => "nullable|integer|min:1|max:26",
            "turns"   => "nullable|integer|min:1",
            'start' => 'nullable|string|size:1|alpha',
        ];
    }

    public function messages()
    {
        return [
            'players.integer' => 'Players must be an integer.',
            'players.min' => 'At least one player is required.',
            'players.max' => 'Maximum 26 players allowed.',
            'turns.integer' => 'Turns must be an integer.',
            'turns.min' => 'At least one turn is required.',
            'start.string' => 'Start must be a string.',
            'start.size' => 'Start must be a single character.',
            'start.alpha' => 'Start must be an alphabetic character.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            $this->errorResponse(
                'Validation failed',
                $validator->errors()->toArray(),
                422
            )
        );
    }
}
