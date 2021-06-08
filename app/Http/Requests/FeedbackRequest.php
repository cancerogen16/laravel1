<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
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
            'message' => 'required|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => ':attribute обязательно для заполнения.',
            'message.required' => 'Сообщение обязательно для заполнения.',
        ];
    }
}
