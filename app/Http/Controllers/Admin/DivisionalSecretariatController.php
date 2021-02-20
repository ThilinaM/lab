<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDivisionalSecretariatRequest;
use App\Http\Requests\StoreDivisionalSecretariatRequest;
use App\Http\Requests\UpdateDivisionalSecretariatRequest;
use App\Models\District;
use App\Models\DivisionalSecretariat;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DivisionalSecretariatController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('divisional_secretariat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = DivisionalSecretariat::with(['district'])->select(sprintf('%s.*', (new DivisionalSecretariat)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'divisional_secretariat_show';
                $editGate      = 'divisional_secretariat_edit';
                $deleteGate    = 'divisional_secretariat_delete';
                $crudRoutePart = 'divisional-secretariats';

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
            $table->addColumn('district_name', function ($row) {
                return $row->district ? $row->district->name : '';
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'district']);

            return $table->make(true);
        }

        return view('admin.divisionalSecretariats.index');
    }

    public function create()
    {
        abort_if(Gate::denies('divisional_secretariat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $districts = District::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.divisionalSecretariats.create', compact('districts'));
    }

    public function store(StoreDivisionalSecretariatRequest $request)
    {
        $divisionalSecretariat = DivisionalSecretariat::create($request->all());

        return redirect()->route('admin.divisional-secretariats.index');
    }

    public function edit(DivisionalSecretariat $divisionalSecretariat)
    {
        abort_if(Gate::denies('divisional_secretariat_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $districts = District::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $divisionalSecretariat->load('district');

        return view('admin.divisionalSecretariats.edit', compact('districts', 'divisionalSecretariat'));
    }

    public function update(UpdateDivisionalSecretariatRequest $request, DivisionalSecretariat $divisionalSecretariat)
    {
        $divisionalSecretariat->update($request->all());

        return redirect()->route('admin.divisional-secretariats.index');
    }

    public function show(DivisionalSecretariat $divisionalSecretariat)
    {
        abort_if(Gate::denies('divisional_secretariat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $divisionalSecretariat->load('district');

        return view('admin.divisionalSecretariats.show', compact('divisionalSecretariat'));
    }

    public function destroy(DivisionalSecretariat $divisionalSecretariat)
    {
        abort_if(Gate::denies('divisional_secretariat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $divisionalSecretariat->delete();

        return back();
    }

    public function massDestroy(MassDestroyDivisionalSecretariatRequest $request)
    {
        DivisionalSecretariat::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
