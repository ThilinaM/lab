<?php

namespace App\Http\Requests;

use App\Models\DivisionalSecretariat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDivisionalSecretariatRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('divisional_secretariat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:divisional_secretariats,id',
        ];
    }
}
