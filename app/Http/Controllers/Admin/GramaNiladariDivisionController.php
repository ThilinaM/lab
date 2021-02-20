<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGramaNiladariDivisionRequest;
use App\Http\Requests\StoreGramaNiladariDivisionRequest;
use App\Http\Requests\UpdateGramaNiladariDivisionRequest;
use App\Models\DivisionalSecretariat;
use App\Models\GramaNiladariDivision;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class GramaNiladariDivisionController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('grama_niladari_division_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = GramaNiladariDivision::with(['divisional_secretariat'])->select(sprintf('%s.*', (new GramaNiladariDivision)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'grama_niladari_division_show';
                $editGate      = 'grama_niladari_division_edit';
                $deleteGate    = 'grama_niladari_division_delete';
                $crudRoutePart = 'grama-niladari-divisions';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->addColumn('divisional_secretariat_name', function ($row) {
                return $row->divisional_secretariat ? $row->divisional_secretariat->name : '';
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'divisional_secretariat']);

            return $table->make(true);
        }

        return view('admin.gramaNiladariDivisions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('grama_niladari_division_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $divisional_secretariats = DivisionalSecretariat::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.gramaNiladariDivisions.create', compact('divisional_secretariats'));
    }

    public function store(StoreGramaNiladariDivisionRequest $request)
    {
        $gramaNiladariDivision = GramaNiladariDivision::create($request->all());

        return redirect()->route('admin.grama-niladari-divisions.index');
    }

    public function edit(GramaNiladariDivision $gramaNiladariDivision)
    {
        abort_if(Gate::denies('grama_niladari_division_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $divisional_secretariats = DivisionalSecretariat::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $gramaNiladariDivision->load('divisional_secretariat');

        return view('admin.gramaNiladariDivisions.edit', compact('divisional_secretariats', 'gramaNiladariDivision'));
    }

    public function update(UpdateGramaNiladariDivisionRequest $request, GramaNiladariDivision $gramaNiladariDivision)
    {
        $gramaNiladariDivision->update($request->all());

        return redirect()->route('admin.grama-niladari-divisions.index');
    }

    public function show(GramaNiladariDivision $gramaNiladariDivision)
    {
        abort_if(Gate::denies('grama_niladari_division_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gramaNiladariDivision->load('divisional_secretariat');

        return view('admin.gramaNiladariDivisions.show', compact('gramaNiladariDivision'));
    }

    public function destroy(GramaNiladariDivision $gramaNiladariDivision)
    {
        abort_if(Gate::denies('grama_niladari_division_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gramaNiladariDivision->delete();

        return back();
    }

    public function massDestroy(MassDestroyGramaNiladariDivisionRequest $request)
    {
        GramaNiladariDivision::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
