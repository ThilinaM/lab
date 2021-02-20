<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInvoiceTypeRequest;
use App\Http\Requests\StoreInvoiceTypeRequest;
use App\Http\Requests\UpdateInvoiceTypeRequest;
use App\Models\InvoiceType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class InvoiceTypeController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('invoice_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = InvoiceType::query()->select(sprintf('%s.*', (new InvoiceType)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'invoice_type_show';
                $editGate      = 'invoice_type_edit';
                $deleteGate    = 'invoice_type_delete';
                $crudRoutePart = 'invoice-types';

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
                return $row->status ? InvoiceType::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.invoiceTypes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('invoice_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.invoiceTypes.create');
    }

    public function store(StoreInvoiceTypeRequest $request)
    {
        $invoiceType = InvoiceType::create($request->all());

        return redirect()->route('admin.invoice-types.index');
    }

    public function edit(InvoiceType $invoiceType)
    {
        abort_if(Gate::denies('invoice_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.invoiceTypes.edit', compact('invoiceType'));
    }

    public function update(UpdateInvoiceTypeRequest $request, InvoiceType $invoiceType)
    {
        $invoiceType->update($request->all());

        return redirect()->route('admin.invoice-types.index');
    }

    public function show(InvoiceType $invoiceType)
    {
        abort_if(Gate::denies('invoice_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.invoiceTypes.show', compact('invoiceType'));
    }

    public function destroy(InvoiceType $invoiceType)
    {
        abort_if(Gate::denies('invoice_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoiceType->delete();

        return back();
    }

    public function massDestroy(MassDestroyInvoiceTypeRequest $request)
    {
        InvoiceType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
