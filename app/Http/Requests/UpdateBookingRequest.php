<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

class UpdateBookingRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'note' => ['nullable', 'string', 'max:250'],
            'state' => ['required', Rule::in(['completado', 'pendiente', 'cancelado'])],
            'client_id' => ['required', 'integer', 'exists:users,id'],
            'barber_id' => ['required', 'integer', 'exists:users,id'],
            'schedule_id' => ['required', 'integer', 'exists:schedules,id'],
            'haircut_id' => ['required', 'integer', 'exists:haircuts,id'],
            'confirmed' => ['nullable', 'boolean'],
            'booking_date' => ['required', 'date'],
        ];
    }
}
