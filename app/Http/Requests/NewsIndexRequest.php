<?php

namespace App\Http\Requests;

use App\Models\NewsCategory;
use Illuminate\Foundation\Http\FormRequest;

class NewsIndexRequest extends FormRequest
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
        $newsCategoryIds = NewsCategory::select('id')->get()->toArray();
        $idsArray = [];

        foreach ($newsCategoryIds as $id) {
            $idsArray[] = $id['id'];
        }

        return [
            'category_id' => [
                'nullable',
                'string',
                'in:all,' . implode(",", $idsArray),
            ],
            'sort' => [
                'nullable',
                'string',
                'in:newest,oldest,most_visited,most_popular'
            ],
            'search' => [
                'nullable',
                'string',
            ]
        ];
    }
}
