<?php

namespace App\Http\Requests;

use App\Models\NicType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNicTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('nic_type_edit');
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
