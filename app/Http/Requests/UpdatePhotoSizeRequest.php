<?php

namespace App\Http\Requests;

use App\Models\PhotoSize;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePhotoSizeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('photo_size_edit');
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
