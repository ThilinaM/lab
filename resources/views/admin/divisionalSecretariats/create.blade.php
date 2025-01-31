@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.divisionalSecretariat.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.divisional-secretariats.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="district_id">{{ trans('cruds.divisionalSecretariat.fields.district') }}</label>
                <select class="form-control select2 {{ $errors->has('district') ? 'is-invalid' : '' }}" name="district_id" id="district_id" required>
                    @foreach($districts as $id => $district)
                        <option value="{{ $id }}" {{ old('district_id') == $id ? 'selected' : '' }}>{{ $district }}</option>
                    @endforeach
                </select>
                @if($errors->has('district'))
                    <div class="invalid-feedback">
                        {{ $errors->first('district') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.divisionalSecretariat.fields.district_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.divisionalSecretariat.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.divisionalSecretariat.fields.name_helper') }}</span>
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