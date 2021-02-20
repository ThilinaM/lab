<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNicTypeRequest;
use App\Http\Requests\StoreNicTypeRequest;
use App\Http\Requests\UpdateNicTypeRequest;
use App\Models\NicType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class NicTypeController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('nic_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = NicType::query()->select(sprintf('%s.*', (new NicType)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'nic_type_show';
                $editGate      = 'nic_type_edit';
                $deleteGate    = 'nic_type_delete';
                $crudRoutePart = 'nic-types';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? NicType::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.nicTypes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('nic_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nicTypes.create');
    }

    public function store(StoreNicTypeRequest $request)
    {
        $nicType = NicType::create($request->all());

        return redirect()->route('admin.nic-types.index');
    }

    public function edit(NicType $nicType)
    {
        abort_if(Gate::denies('nic_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nicTypes.edit', compact('nicType'));
    }

    public function update(UpdateNicTypeRequest $request, NicType $nicType)
    {
        $nicType->update($request->all());

        return redirect()->route('admin.nic-types.index');
    }

    public function show(NicType $nicType)
    {
        abort_if(Gate::denies('nic_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.nicTypes.show', compact('nicType'));
    }

    public function destroy(NicType $nicType)
    {
        abort_if(Gate::denies('nic_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $nicType->delete();

        return back();
    }

    public function massDestroy(MassDestroyNicTypeRequest $request)
    {
        NicType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
