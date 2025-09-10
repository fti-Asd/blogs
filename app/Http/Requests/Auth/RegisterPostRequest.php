<?php

namespace App\Http\Requests\Auth;

use App\Enums\UserGender;
use App\Enums\UserMilitaryService;
use Illuminate\Foundation\Http\FormRequest;

class RegisterPostRequest extends FormRequest
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
        $genders = implode(',', array_column(UserGender::cases(), 'value'));
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
            'national_code' => [
                'required',
                'ir_national_id',
            ],
            'gender' => [
                'required',
                'in:' . $genders
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
                'unique:App\Models\User,email'
            ],
            'username' => [
                'required',
                'regex:/^[a-zA-Z0-9_\-]*$/',
                'max:128',
                'unique:App\Models\User,username'
            ],
            'password' => [
                'required',
                'string',
                'min:6',
                'confirmed'
            ],
            'accept_rules' => [
                'required',
                'string',
                'in:1'
            ]
        ];
    }

    public function attributes()
    {
        return [
            'military_service_status' => 'وضعیت نظام وظیفه',
            'accept_rules' => 'قبول قوانین'
        ];
    }
}
