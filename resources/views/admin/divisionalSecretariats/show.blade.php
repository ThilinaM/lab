@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.divisionalSecretariat.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.divisional-secretariats.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.divisionalSecretariat.fields.id') }}
                        </th>
                        <td>
                            {{ $divisionalSecretariat->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.divisionalSecretariat.fields.district') }}
                        </th>
                        <td>
                            {{ $divisionalSecretariat->district->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.divisionalSecretariat.fields.name') }}
                        </th>
                        <td>
                            {{ $divisionalSecretariat->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.divisional-secretariats.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection