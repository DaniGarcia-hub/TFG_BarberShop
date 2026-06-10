<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

use App\Models\Schedule;

class StoreScheduleRequest extends FormRequest
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
            'day_of_week' => ['required', Rule::in(['1', '2', '3', '4', '5', '6', '7'])],
            'shift_type' => ['required', Rule::in(['mañana', 'tarde'])],
            'start_time' => ['required', 'date_format:H:i'],
            'finish_time' => ['required', 'date_format:H:i', 'after:start_time'],
            'active' => ['nullable', 'boolean'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            
            $existsDuplicated = Schedule::withTrashed()
                ->where('day_of_week', $this->day_of_week)
                ->where('shift_type', $this->shift_type)
                ->where('start_time', $this->start_time)
                ->where('finish_time', $this->finish_time)
                ->exists();

            if ($existsDuplicated) {
                $validator->errors()->add('start_time', 'Ya existe un horario con esas especificaciones.');
            }
        });
    }
}
