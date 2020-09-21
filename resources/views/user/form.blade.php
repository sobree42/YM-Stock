<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">{{__('Name')}}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') ?  old('name') : (isset($user) ? $user->name : '' ) }}" placeholder="">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">{{__('Gender')}}</label>
            <select class="custom-select @error('gender') is-invalid @enderror" name="gender">
                <option selected disabled>{{__('Choose...')}}</option>
                <option value="Male"
                    {{ (old('gender') == 'Male') || (isset($user)) && $user->gender == 'Male'  ? 'selected' : '' }}>{{__('Male')}}
                </option>
                <option value="Female"
                    {{ (old('gender') == 'Female') || (isset($user)) && $user->gender == 'Female' ? 'selected' : '' }}>
                    {{__('Female')}}</option>
            </select>
            @error('gender')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">{{__('Phone')}}</label>
            <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror"
                value="{{ old('phone') ?  old('phone') : (isset($user) ? $user->phone : '' ) }}" placeholder="">
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">{{__('Email')}}</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') ?  old('email') : (isset($user) ? $user->email : '' ) }}" placeholder="">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label>{{__('Profile picture')}}</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="profile_picture" id="validatedCustomFile">
                <label class="custom-file-label @error('profile_picture') border-danger @enderror" for="validatedCustomFile">{{__('Choose file...')}}</label>
            </div>
            @error('profile_picture')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">{{__('Create Password')}} @if(isset($user)) <small class="text-danger">*{{__('If dont want to change just let empty')}}</small> @endif </label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                placeholder="">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">{{__('Confirm Password')}}</label>
            <input type="password" name="password_confirmation"
                class="form-control @error('password') is-invalid @enderror" placeholder="">
        </div>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-success">{{__('Save')}}</button>
        <a href="{{ route('user.index') }}" class="btn btn-danger">{{__('Cancel')}}</a>
    </div>
</div>
