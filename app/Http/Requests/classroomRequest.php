<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class classroomRequest extends FormRequest
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
        // $this->isMethod('post');
        // $this->route('classroom');

        return [
            'name' => ['required','string','max:255' , function($attribute , $value , $fail){
                if( $value == 'admin'){
                    return $fail('This :attribute value is forbidden!');
                }
            }], // roles
            'section' => 'nullable|string|max:255',
            'subject' => 'nullable|string|max:255',
            'room' => 'nullable|string|max:255',
            'cove_image' => [
                'nullable',
                'Image',
                'max:1', // 1 kelo = 1024
                Rule::dimensions([
                    'min_width' => 600,
                    'min_height' => 300,

                ]),
            ],
        ];
    }

    public function messages(): array
    {
        return [

            'required' => ':attribute Requerted!', // :attribute > لطباعة اسم الحقل
            'name.required' => 'The name is required !',
            'cover_image_path' => 'Image size is great that 1M'

        ];
    }
}
