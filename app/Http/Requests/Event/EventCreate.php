<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class EventCreate extends FormRequest
{

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
            'name' => 'sometimes|nullable',
            'time_from' => 'sometimes|nullable',
            'time_to' => 'sometimes|nullable',
            'color_code' => 'sometimes|nullable',
            'created_by' => 'sometimes|nullable',
        ];
    }

    public function attributes()
    {
        return  [];
    }
}
