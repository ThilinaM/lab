<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDivisionalSecretariatRequest;
use App\Http\Requests\UpdateDivisionalSecretariatRequest;
use App\Http\Resources\Admin\DivisionalSecretariatResource;
use App\Models\DivisionalSecretariat;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DivisionalSecretariatApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('divisional_secretariat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DivisionalSecretariatResource(DivisionalSecretariat::with(['district'])->get());
    }

    public function store(StoreDivisionalSecretariatRequest $request)
    {
        $divisionalSecretariat = DivisionalSecretariat::create($request->all());

        return (new DivisionalSecretariatResource($divisionalSecretariat))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DivisionalSecretariat $divisionalSecretariat)
    {
        abort_if(Gate::denies('divisional_secretariat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DivisionalSecretariatResource($divisionalSecretariat->load(['district']));
    }

    public function update(UpdateDivisionalSecretariatRequest $request, DivisionalSecretariat $divisionalSecretariat)
    {
        $divisionalSecretariat->update($request->all());

        return (new DivisionalSecretariatResource($divisionalSecretariat))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DivisionalSecretariat $divisionalSecretariat)
    {
        abort_if(Gate::denies('divisional_secretariat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $divisionalSecretariat->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
