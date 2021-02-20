@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.invoiceType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.invoice-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceType.fields.id') }}
                        </th>
                        <td>
                            {{ $invoiceType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceType.fields.name') }}
                        </th>
                        <td>
                            {{ $invoiceType->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.invoiceType.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\InvoiceType::STATUS_SELECT[$invoiceType->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.invoice-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection