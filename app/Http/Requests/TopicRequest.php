<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopicRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', function ($attribute, $value, $fail) {
                if ($value == 'admin') {
                    return $fail('This :attribute value is forbidden!');
                }
            }],
            'classroom_id' => 'required | integer ',
            'user_id' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [

            'required' => ':attribute Requerted!', // :attribute > لطباعة اسم الحقل
            'name.required' => 'The name is required !',
            'classroom_id.required' =>'The Classroom ID is required !',
            'user_id.required' =>'The User ID is required !',

        ];
    }
}
