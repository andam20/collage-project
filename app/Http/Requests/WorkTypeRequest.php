<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorktypeRequest extends FormRequest
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
            "name" => ["required"],
            // "company_profile_id"=>["required","exists:company_profiles,id"], 
        ];
    }
}