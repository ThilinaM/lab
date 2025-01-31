<?php

namespace App\Http\Requests;

use App\Models\PaperType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePaperTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('paper_type_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
