@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.nicType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.nic-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.nicType.fields.id') }}
                        </th>
                        <td>
                            {{ $nicType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nicType.fields.name') }}
                        </th>
                        <td>
                            {{ $nicType->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nicType.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\NicType::STATUS_SELECT[$nicType->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.nic-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection