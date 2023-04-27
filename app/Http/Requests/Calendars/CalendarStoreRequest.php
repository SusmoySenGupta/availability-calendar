<?php

namespace App\Http\Requests\Calendars;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CalendarStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required',
                'string',
                'max:100',
                'min:4',
                'regex:/^[a-zA-Z0-9\s]+$/',
                Rule::unique('calendars', 'title')
                    ->where('organization_id', $this->user()->organization_id),
            ],
        ];
    }
}
