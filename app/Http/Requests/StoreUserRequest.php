<?php

namespace App\Http\Requests;


use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

use App\Models\User;

class StoreUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', Rules\Password::defaults()],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'telefono' => ['nullable', 'numeric', 'digits:9'],
            'direccion' => ['nullable', 'string', 'max:150'],
            'fecha_nacimiento' => ['nullable', 'date', 'before:today', 'after:1920-01-01'],
            'role' => ['required', 'string', function ($attribute, $value, $fail) {
                if ($value === 'cliente') {
                    return;
                }
                
                $roleExists = \DB::table('roles')->where('name', $value)->exists();
                if (!$roleExists) {
                    $fail('El rol seleccionado no es válido.');
                }
            }],
            'verify_email' => ['nullable', 'boolean'],
        ];
    }
}
