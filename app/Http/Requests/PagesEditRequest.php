<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PagesEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return config('app.actions_guard', FALSE);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'name'  => 'required|max:255',
            'alias' => 'required|max:255|unique:pages,alias,' . $request->id,
            'text'  => 'required',
            'images' => 'image'
        ];
    }
}
