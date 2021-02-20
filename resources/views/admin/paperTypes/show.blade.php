@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.paperType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.paper-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.paperType.fields.id') }}
                        </th>
                        <td>
                            {{ $paperType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paperType.fields.name') }}
                        </th>
                        <td>
                            {{ $paperType->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paperType.fields.description') }}
                        </th>
                        <td>
                            {{ $paperType->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.paperType.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\PaperType::STATUS_SELECT[$paperType->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.paper-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection