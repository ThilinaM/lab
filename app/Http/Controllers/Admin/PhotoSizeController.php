<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPhotoSizeRequest;
use App\Http\Requests\StorePhotoSizeRequest;
use App\Http\Requests\UpdatePhotoSizeRequest;
use App\Models\PhotoSize;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PhotoSizeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('photo_size_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $photoSizes = PhotoSize::all();

        return view('admin.photoSizes.index', compact('photoSizes'));
    }

    public function create()
    {
        abort_if(Gate::denies('photo_size_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.photoSizes.create');
    }

    public function store(StorePhotoSizeRequest $request)
    {
        $photoSize = PhotoSize::create($request->all());

        return redirect()->route('admin.photo-sizes.index');
    }

    public function edit(PhotoSize $photoSize)
    {
        abort_if(Gate::denies('photo_size_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.photoSizes.edit', compact('photoSize'));
    }

    public function update(UpdatePhotoSizeRequest $request, PhotoSize $photoSize)
    {
        $photoSize->update($request->all());

        return redirect()->route('admin.photo-sizes.index');
    }

    public function show(PhotoSize $photoSize)
    {
        abort_if(Gate::denies('photo_size_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.photoSizes.show', compact('photoSize'));
    }

    public function destroy(PhotoSize $photoSize)
    {
        abort_if(Gate::denies('photo_size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $photoSize->delete();

        return back();
    }

    public function massDestroy(MassDestroyPhotoSizeRequest $request)
    {
        PhotoSize::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
