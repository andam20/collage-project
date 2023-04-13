<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
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
            "category" => ["required", "string"],
            "amount" => ["required"],
            "date" => ["required"],
            "description" => ["required", "string"],
            "status" => ["required"],
            "paid_back" => ["required"],
            "company_profile_id" => ["required", "exists:company_profiles,id"],
        ];
    }
}