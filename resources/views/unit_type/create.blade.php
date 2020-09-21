@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark ">{{__('Create Unit Type')}}
        </h6>
    </div>
    <div class="card-body">
        <form action="{{ route('unit_type.store') }}" method="post">
            @csrf
            @include('unit_type.form')
        </form>
    </div>
</div>
@endsection
