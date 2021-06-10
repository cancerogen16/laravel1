<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
//        return auth()->check();
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
            'title' => 'required|min:5|max:200',
            'slug' => 'max:200',
            'image' => 'sometimes',
            'description' => 'required|min:3|max:500',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'Заголовок новости',
            'slug' => 'Ярлык',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Заголовок новости обязателен для заполнения.',
            'description.required' => 'Описание обязательно для заполнения.',
        ];
    }
}
