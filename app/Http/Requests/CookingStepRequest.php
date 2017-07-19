<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CookingStepRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cooking_id' => 'required',
            'step' => 'required',
            'content' => 'required',
            'status' => 'required',
        ];
    }
}
