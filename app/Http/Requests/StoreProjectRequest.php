<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProjectRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize() : bool {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules() : array {
        return [
            'name' => ['required', 'string', 'min:1', 'max:250', 'unique:projects,name'],
            'type_id' => ['required', 'numeric', 'integer', 'exists:types,id'],
            'description' => ['nullable', 'string', 'min:1', 'max:500'],
            'img' => ['nullable', 'image', 'max:256']
        ];
    }
}