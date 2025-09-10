<?php

namespace App\Http\Requests\Account;

use App\Enums\UserGender;
use App\Enums\UserMilitaryService;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
        $militaryServices = implode(',', array_column(UserMilitaryService::cases(), 'value'));

        return [
            'first_name' => [
                'required',
                'persian_alpha',
                'max:128'
            ],
            'last_name' => [
                'required',
                'persian_alpha',
                'max:128'
            ],
            'military_service_status' => [
                'nullable',
                'required_if:gender,' . UserGender::MALE->value,
                'in:' . $militaryServices
            ],
            'mobile' => [
                'required',
                'ir_mobile',
            ],
            'email' => [
                'required',
                'email',
                'max:128',
                'unique:App\Models\User,email,'.auth('web')->id()
            ],
            'username' => [
                'required',
                'regex:/^[a-zA-Z0-9_\-]*$/',
                'max:128',
                'unique:App\Models\User,username,'.auth('web')->id()
            ],
            'password' => [
                'nullable',
                'string',
                'min:6',
                'confirmed'
            ],
            'state_id' => [
                'nullable',
                'int'
            ],
            'city_id' => [
                'nullable',
                'int',
            ],
            'avatar_file' => [
                'nullable',
                'file',
                'max:800',
                'mimes:jpg,jpeg,png,bmp',
            ]
        ];
    }

    public function attributes()
    {
        return [
            'military_service_status' => 'وضعیت نظام وظیفه',
            'accept_rules' => 'قبول قوانین',
            'state_id' => 'استان',
            'city_id' => 'شهر',
        ];
    }
}
