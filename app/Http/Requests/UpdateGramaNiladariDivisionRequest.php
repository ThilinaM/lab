<?php

namespace App\Http\Requests;

use App\Models\GramaNiladariDivision;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGramaNiladariDivisionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('grama_niladari_division_edit');
    }

    public function rules()
    {
        return [
            'divisional_secretariat_id' => [
                'required',
                'integer',
            ],
            'name'                      => [
                'string',
                'required',
            ],
        ];
    }
}
