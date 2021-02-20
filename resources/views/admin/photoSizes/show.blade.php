@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.photoSize.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.photo-sizes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.photoSize.fields.id') }}
                        </th>
                        <td>
                            {{ $photoSize->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.photoSize.fields.name') }}
                        </th>
                        <td>
                            {{ $photoSize->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.photoSize.fields.description') }}
                        </th>
                        <td>
                            {{ $photoSize->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.photo-sizes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection