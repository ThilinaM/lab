@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.gramaNiladariDivision.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.grama-niladari-divisions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.gramaNiladariDivision.fields.id') }}
                        </th>
                        <td>
                            {{ $gramaNiladariDivision->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gramaNiladariDivision.fields.divisional_secretariat') }}
                        </th>
                        <td>
                            {{ $gramaNiladariDivision->divisional_secretariat->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gramaNiladariDivision.fields.name') }}
                        </th>
                        <td>
                            {{ $gramaNiladariDivision->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.grama-niladari-divisions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection