<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReservationRequest extends FormRequest
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
            'user_id' => ['sometimes', 'exists:users,id'], 
            'reservation_date' => ['sometimes', 'date', 'after_or_equal:today'], 
            'reservation_time' => ['sometimes', 'date_format:H:i'], 
            'status' => ['sometimes', 'in:pending,confirmed,cancelled'], 
            'notes' => ['nullable', 'string', 'max:1000']
        ];
    }
}
