<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
                // "manager_line_id" => ["required", "exists:manager_lines,id"],
                "slogan" => ["required"],
                "start_date" => ["required"],
                "phone_no" => ["required"],
                "email" => ["required"],
                "address" => ["required","string"],
                "password" => ["required"],
            ];
        }
}
