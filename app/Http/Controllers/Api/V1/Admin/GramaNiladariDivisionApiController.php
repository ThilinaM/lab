<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGramaNiladariDivisionRequest;
use App\Http\Requests\UpdateGramaNiladariDivisionRequest;
use App\Http\Resources\Admin\GramaNiladariDivisionResource;
use App\Models\GramaNiladariDivision;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GramaNiladariDivisionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('grama_niladari_division_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GramaNiladariDivisionResource(GramaNiladariDivision::with(['divisional_secretariat'])->get());
    }

    public function store(StoreGramaNiladariDivisionRequest $request)
    {
        $gramaNiladariDivision = GramaNiladariDivision::create($request->all());

        return (new GramaNiladariDivisionResource($gramaNiladariDivision))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(GramaNiladariDivision $gramaNiladariDivision)
    {
        abort_if(Gate::denies('grama_niladari_division_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GramaNiladariDivisionResource($gramaNiladariDivision->load(['divisional_secretariat']));
    }

    public function update(UpdateGramaNiladariDivisionRequest $request, GramaNiladariDivision $gramaNiladariDivision)
    {
        $gramaNiladariDivision->update($request->all());

        return (new GramaNiladariDivisionResource($gramaNiladariDivision))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(GramaNiladariDivision $gramaNiladariDivision)
    {
        abort_if(Gate::denies('grama_niladari_division_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gramaNiladariDivision->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
