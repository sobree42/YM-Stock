<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">{{__('Name')}}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') ?  old('name') : (isset($product) ? $product->name : '' ) }}" placeholder="">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">{{__('Brand')}}</label>
            <select class="custom-select @error('brand_id') is-invalid @enderror" name="brand_id">
                <option selected disabled>{{__('Choose...')}}</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}"
                        @if (old('brand_id') && old('brand_id') == $brand->id)
                            {{ 'selected' }}
                        @elseif (isset($product) && $product->brand_id == $brand->id)
                            {{ 'selected' }}
                        @endif
                        >{{ $brand->name }}</option>
                @endforeach
            </select>
            @error('brand_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">{{__('Category')}}</label>
            <select class="custom-select @error('category_id') is-invalid @enderror" name="category_id">
                <option selected disabled>{{__('Choose...')}}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        @if (old('category_id') && old('category_id') == $category->id)
                            {{ 'selected' }}
                        @elseif (isset($product) && $product->category_id == $category->id)
                            {{ 'selected' }}
                        @endif
                        >{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">{{__('Store')}}</label>
            <select class="custom-select @error('store_id') is-invalid @enderror" name="store_id">
                <option selected disabled>{{__('Choose...')}}</option>
                @foreach ($stores as $store)
                    <option value="{{ $store->id }}"
                        @if (old('store_id') && old('store_id') == $store->id)
                            {{ 'selected' }}
                        @elseif (isset($product) && $product->store_id == $store->id)
                            {{ 'selected' }}
                        @endif
                        >{{ $store->name }}</option>
                @endforeach
            </select>
            @error('store_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">{{__('Quantity')}}</label>
            <input type="text" disabled name="quantity" class="form-control"
                value="0" placeholder="">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">{{__('Unit Type')}}</label>
            <select class="custom-select @error('unit_type') is-invalid @enderror" name="unit_type">
                <option selected disabled>{{__('Choose...')}}</option>
                @foreach ($unit_types as $unit_type)
                    <option value="{{ $unit_type->id }}"
                        @if (old('unit_type') && old('unit_type') == $unit_type->id)
                            {{ 'selected' }}
                        @elseif (isset($product) && $product->unit_type_id == $unit_type->id)
                            {{ 'selected' }}
                        @endif
                        >{{ $unit_type->type }}</option>
                @endforeach
            </select>
            @error('unit_type')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-success">{{__('Save')}}</button>
        <a href="{{ route('product.index') }}" class="btn btn-danger">{{__('Cancel')}}</a>
    </div>
</div>
