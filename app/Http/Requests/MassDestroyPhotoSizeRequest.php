<?php

namespace App\Http\Requests;

use App\Models\PhotoSize;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPhotoSizeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('photo_size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:photo_sizes,id',
        ];
    }
}
