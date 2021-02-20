<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVisaBackgroundColorRequest;
use App\Http\Requests\UpdateVisaBackgroundColorRequest;
use App\Http\Resources\Admin\VisaBackgroundColorResource;
use App\Models\VisaBackgroundColor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VisaBackgroundColorApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('visa_background_color_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VisaBackgroundColorResource(VisaBackgroundColor::all());
    }

    public function store(StoreVisaBackgroundColorRequest $request)
    {
        $visaBackgroundColor = VisaBackgroundColor::create($request->all());

        return (new VisaBackgroundColorResource($visaBackgroundColor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(VisaBackgroundColor $visaBackgroundColor)
    {
        abort_if(Gate::denies('visa_background_color_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VisaBackgroundColorResource($visaBackgroundColor);
    }

    public function update(UpdateVisaBackgroundColorRequest $request, VisaBackgroundColor $visaBackgroundColor)
    {
        $visaBackgroundColor->update($request->all());

        return (new VisaBackgroundColorResource($visaBackgroundColor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(VisaBackgroundColor $visaBackgroundColor)
    {
        abort_if(Gate::denies('visa_background_color_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $visaBackgroundColor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
