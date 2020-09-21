@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark ">{{__('Edit Unit Type')}}
        </h6>
    </div>
    <div class="card-body">
        <form action="{{ route('unit_type.update', $unit_type->id) }}" method="post">
            @csrf
            @method('PUT')
            @include('unit_type.form')
        </form>
    </div>
</div>
@endsection
