<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePhotoSizeRequest;
use App\Http\Requests\UpdatePhotoSizeRequest;
use App\Http\Resources\Admin\PhotoSizeResource;
use App\Models\PhotoSize;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PhotoSizeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('photo_size_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PhotoSizeResource(PhotoSize::all());
    }

    public function store(StorePhotoSizeRequest $request)
    {
        $photoSize = PhotoSize::create($request->all());

        return (new PhotoSizeResource($photoSize))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PhotoSize $photoSize)
    {
        abort_if(Gate::denies('photo_size_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PhotoSizeResource($photoSize);
    }

    public function update(UpdatePhotoSizeRequest $request, PhotoSize $photoSize)
    {
        $photoSize->update($request->all());

        return (new PhotoSizeResource($photoSize))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PhotoSize $photoSize)
    {
        abort_if(Gate::denies('photo_size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $photoSize->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
