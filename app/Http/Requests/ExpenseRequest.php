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
            "date" => ["required"],
            "description" => ["required", "string"],
            "amount" => ["required"],
            "acceptance" => ["required"],
            "paid_back" => ["required"],
        
        ];
    }
}
