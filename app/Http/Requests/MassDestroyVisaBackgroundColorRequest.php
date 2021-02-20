<?php

namespace App\Http\Requests;

use App\Models\VisaBackgroundColor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyVisaBackgroundColorRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('visa_background_color_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:visa_background_colors,id',
        ];
    }
}
