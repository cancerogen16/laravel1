<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:55',
            'phone' => 'required|max:20',
            'email' => 'required|email:rfc,dns',
            'info' => 'required|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => ':attribute обязательно для заполнения.',
            'phone.required' => 'Номер телефона обязателен для заполнения.',
            'email.required' => 'Email-адрес обязателен для заполнения.',
            'info.required' => 'Информация обязательна для заполнения.',
        ];
    }
}
