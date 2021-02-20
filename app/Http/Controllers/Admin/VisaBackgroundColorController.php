<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVisaBackgroundColorRequest;
use App\Http\Requests\StoreVisaBackgroundColorRequest;
use App\Http\Requests\UpdateVisaBackgroundColorRequest;
use App\Models\VisaBackgroundColor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class VisaBackgroundColorController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('visa_background_color_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = VisaBackgroundColor::query()->select(sprintf('%s.*', (new VisaBackgroundColor)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'visa_background_color_show';
                $editGate      = 'visa_background_color_edit';
                $deleteGate    = 'visa_background_color_delete';
                $crudRoutePart = 'visa-background-colors';

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
            $table->editColumn('color', function ($row) {
                return $row->color ? $row->color : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.visaBackgroundColors.index');
    }

    public function create()
    {
        abort_if(Gate::denies('visa_background_color_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.visaBackgroundColors.create');
    }

    public function store(StoreVisaBackgroundColorRequest $request)
    {
        $visaBackgroundColor = VisaBackgroundColor::create($request->all());

        return redirect()->route('admin.visa-background-colors.index');
    }

    public function edit(VisaBackgroundColor $visaBackgroundColor)
    {
        abort_if(Gate::denies('visa_background_color_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.visaBackgroundColors.edit', compact('visaBackgroundColor'));
    }

    public function update(UpdateVisaBackgroundColorRequest $request, VisaBackgroundColor $visaBackgroundColor)
    {
        $visaBackgroundColor->update($request->all());

        return redirect()->route('admin.visa-background-colors.index');
    }

    public function show(VisaBackgroundColor $visaBackgroundColor)
    {
        abort_if(Gate::denies('visa_background_color_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.visaBackgroundColors.show', compact('visaBackgroundColor'));
    }

    public function destroy(VisaBackgroundColor $visaBackgroundColor)
    {
        abort_if(Gate::denies('visa_background_color_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $visaBackgroundColor->delete();

        return back();
    }

    public function massDestroy(MassDestroyVisaBackgroundColorRequest $request)
    {
        VisaBackgroundColor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
