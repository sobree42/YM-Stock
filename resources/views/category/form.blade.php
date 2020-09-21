<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="form-group">
            <label for="">{{__('Name')}}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') ?  old('name') : (isset($category) ? $category->name : '' ) }}" placeholder="">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">{{__('Save')}}</button>
            <a href="{{ route('category.index') }}" class="btn btn-danger">{{__('Cancel')}}</a>
        </div>
    </div>
</div>
