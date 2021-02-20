<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNicTypeRequest;
use App\Http\Requests\UpdateNicTypeRequest;
use App\Http\Resources\Admin\NicTypeResource;
use App\Models\NicType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NicTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('nic_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NicTypeResource(NicType::all());
    }

    public function store(StoreNicTypeRequest $request)
    {
        $nicType = NicType::create($request->all());

        return (new NicTypeResource($nicType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(NicType $nicType)
    {
        abort_if(Gate::denies('nic_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NicTypeResource($nicType);
    }

    public function update(UpdateNicTypeRequest $request, NicType $nicType)
    {
        $nicType->update($request->all());

        return (new NicTypeResource($nicType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(NicType $nicType)
    {
        abort_if(Gate::denies('nic_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nicType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
