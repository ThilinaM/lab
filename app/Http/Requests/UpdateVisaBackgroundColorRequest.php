<?php

namespace App\Http\Requests;

use App\Models\VisaBackgroundColor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVisaBackgroundColorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('visa_background_color_edit');
    }

    public function rules()
    {
        return [
            'color' => [
                'string',
                'required',
            ],
        ];
    }
}
