@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.visaBackgroundColor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.visa-background-colors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.visaBackgroundColor.fields.id') }}
                        </th>
                        <td>
                            {{ $visaBackgroundColor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visaBackgroundColor.fields.color') }}
                        </th>
                        <td>
                            {{ $visaBackgroundColor->color }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.visa-background-colors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection