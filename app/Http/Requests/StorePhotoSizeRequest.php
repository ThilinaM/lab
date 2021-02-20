<?php

namespace App\Http\Requests;

use App\Models\PhotoSize;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePhotoSizeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('photo_size_create');
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
