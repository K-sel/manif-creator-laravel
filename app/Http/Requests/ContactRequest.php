<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class ContactRequest extends FormRequest
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
            'start' => [
                'required',
                'date',
                'after_or_equal:tomorrow', // La date de début doit être dans le futur (au moins demain)
            ],
            'end' => [
                'required',
                'date',
                'after:start',
                function ($attribute, $value, $fail) {
                    $startDate = Carbon::parse($this->input('start'));
                    $endDate = Carbon::parse($value);

                    $diffInDays = $startDate->diffInDays($endDate);

                    // La manifestation doit durer entre 3 et 5 jours
                    if ($diffInDays < 2 || $diffInDays > 4) {
                        $fail('La durée entre la date de début et de fin doit être de 3 à 5 jours.');
                    }
                }
            ],
            'location' => [
                'required',
                'string',
                'min:3', // Doit contenir au moins 3 lettres
                'regex:/^[A-Z][a-z]+$/' // Doit commencer par une majuscule, suivie de minuscules
            ]
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'start.required' => 'La date de début doit être dans le futur (au moins demain).',
            'end.required' => 'La manifestation doit durer entre 3 et 5 jours.',
            'location.required' => 'Le lieu doit contenir au moins 3 lettres et doit commencer par une majuscule, suivie de minuscules.'
        ];
    }
}
