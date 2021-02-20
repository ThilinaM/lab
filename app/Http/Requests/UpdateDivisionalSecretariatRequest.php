<?php

namespace App\Http\Requests;

use App\Models\DivisionalSecretariat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDivisionalSecretariatRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('divisional_secretariat_edit');
    }

    public function rules()
    {
        return [
            'district_id' => [
                'required',
                'integer',
            ],
            'name'        => [
                'string',
                'required',
            ],
        ];
    }
}
