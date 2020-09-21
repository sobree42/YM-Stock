@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark ">{{__('Edit Brand')}}
        </h6>
    </div>
    <div class="card-body">
        <form action="{{ route('brand.update', $brand->id) }}" method="post">
            @csrf
            @method('PUT')
            @include('brand.form')
        </form>
    </div>
</div>
@endsection
