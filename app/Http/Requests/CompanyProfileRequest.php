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
            "name" => ["required", "string"],
            "password" => ["required"],
            "desc" => ["string", "required"],
            "dob" => [ "required"],
            "start_date" => [ "required"],
            "phone_no" => ["string", "required"],
            "work_type" => ["string", "required"],
            "salary" => ["string", "required"],
            "gender" => ["string", "required"],
            "email" => ["string", "required"],
            "image.*" => ['sometimes', 'mimes:jpg,png,jpeg,gif,svg'],

        ];
    }
}