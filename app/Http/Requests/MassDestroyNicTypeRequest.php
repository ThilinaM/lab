<?php

namespace App\Http\Requests;

use App\Models\NicType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyNicTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('nic_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:nic_types,id',
        ];
    }
}
