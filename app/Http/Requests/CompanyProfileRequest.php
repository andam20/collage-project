<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyProfileRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "first_name" => ["required", "string"],
            "last_name" => ["required", "string"],
            "salary" => ["required","numeric","min:0"],
            "gender" => ["required", "string"],
            // "work_type_id" => ["required"],
            "start_date" => [ "required","date"],
            "phone_no" => ["required","min:7"],
            "email" => ["string", "required"],
            "address" => ["string", "required"],
            "password" => ["required","min:8"],
            "image.*" => ['sometimes', 'mimes:jpg,png,jpeg,gif,svg'],

        ];
    }
}