<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
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
            'user_id' => ['required', 'exists:users,id'], 
            'reservation_date' => ['required', 'date', 'after_or_equal:today'], 
            'reservation_time' => ['required', 'date_format:H:i'], 
            'status' => ['nullable', 'in:pending,confirmed,cancelled'], 
            'notes' => ['nullable', 'string', 'max:1000']
        ];
    }
}
