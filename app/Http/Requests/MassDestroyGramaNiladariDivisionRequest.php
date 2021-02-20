<?php

namespace App\Http\Requests;

use App\Models\GramaNiladariDivision;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGramaNiladariDivisionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('grama_niladari_division_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:grama_niladari_divisions,id',
        ];
    }
}
