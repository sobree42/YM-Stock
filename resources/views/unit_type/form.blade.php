<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="form-group">
            <label for="">{{__('Name')}}</label>
            <input type="text" name="type" class="form-control @error('type') is-invalid @enderror"
            value="{{ old('type') ?  old('type') : (isset($unit_type) ? $unit_type->type : '' ) }}" placeholder="">

        @error('type')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">{{__('Save')}}</button>
            <a href="{{ route('unit_type.index') }}" class="btn btn-danger">{{__('Cancel')}}</a>
        </div>
    </div>
</div>
