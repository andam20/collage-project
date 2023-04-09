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
            "start_date" => [ "required","date"],
            "slogan" => [ "required"],
            "phone_no" => ["string", "required"],
            "email" => ["string", "required"],
            "address" => ["string", "required"],
            "password" => ["required"],
            "image.*" => ['sometimes', 'mimes:jpg,png,jpeg,gif,svg'],

        ];
    }
}