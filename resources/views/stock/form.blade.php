<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="form-group">
            <label for="">Quantity</label>
            <input type="number" step="0.1" name="quantity" class="form-control @error('quantity') is-invalid @enderror"
                value="{{ old('quantity') }}" placeholder="">
            @error('quantity')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        @if(request()->routeIs('stock-in.create'))
        <div class="form-group">
            <label for="">Price</label>
            <div class="input-group">

            <input type="number" step="any" name="price" class="form-control @error('price') is-invalid @enderror"
                value="{{ old('price') }}" placeholder="">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-gradient-light">฿</div>
                  </div>
            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        </div>
        @endif
        <div class="form-group">
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('product.index') }}" class="btn btn-danger">Cancel</a>
        </div>
    </div>
</div>
