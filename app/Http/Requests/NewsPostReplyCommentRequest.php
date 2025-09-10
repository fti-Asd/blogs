<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsPostReplyCommentRequest extends FormRequest
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
            'comment_text' => [
                'required',
                'string',
                'max:255'
            ],
            'name' => [
                'nullable',
                'persian_alpha',
                'max:128'
            ],
            'email' => [
                'nullable',
                'email',
                'max:128'
            ],
            'user_id' => [
                'nullable',
                'exists:App\Models\User,id'
            ],
            'admin_id' => [
                'nullable',
                'exists:App\Models\Admin,id'
            ]
        ];
    }

    public function attributes()
    {
        return [
            'comment_text' => "پیام",
        ];
    }
}
