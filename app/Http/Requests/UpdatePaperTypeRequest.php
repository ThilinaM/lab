<?php

namespace App\Http\Requests;

use App\Models\PaperType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePaperTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('paper_type_edit');
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
