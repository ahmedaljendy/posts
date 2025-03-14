<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'title' =>[
                'required',
                'max:255',
                Rule::unique('posts', 'title')->ignore($this->route('post')),
            ] ,
            'description' => 'required|max:255',
            'post_creator' => 'required',
            'photo' => 'nullable|image|mimes:png,jpg|max:4096',
        ];
    }
    public function messages(): array
    {
        return [
            //
            'title.required' => 'Please enter the title',
            'description.required' => 'Please enter the description',
            'post_creator.required' => 'Please select the post creator',
            'photo.image' => 'The file must be an image',
            'photo.mimes' => 'The image must be of type png or jpg',
            'photo.max' => 'The image must be less than 4MB',
        ];
    }
}
