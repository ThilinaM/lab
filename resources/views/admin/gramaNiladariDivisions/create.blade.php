@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.gramaNiladariDivision.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.grama-niladari-divisions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="divisional_secretariat_id">{{ trans('cruds.gramaNiladariDivision.fields.divisional_secretariat') }}</label>
                <select class="form-control select2 {{ $errors->has('divisional_secretariat') ? 'is-invalid' : '' }}" name="divisional_secretariat_id" id="divisional_secretariat_id" required>
                    @foreach($divisional_secretariats as $id => $divisional_secretariat)
                        <option value="{{ $id }}" {{ old('divisional_secretariat_id') == $id ? 'selected' : '' }}>{{ $divisional_secretariat }}</option>
                    @endforeach
                </select>
                @if($errors->has('divisional_secretariat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('divisional_secretariat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gramaNiladariDivision.fields.divisional_secretariat_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.gramaNiladariDivision.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.gramaNiladariDivision.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection