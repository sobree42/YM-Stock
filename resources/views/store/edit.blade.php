@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark ">{{__('Edit Store')}}
        </h6>
    </div>
    <div class="card-body">
        <form action="{{ route('store.update', $store->id) }}" method="post">
            @csrf
            @method('PUT')
            @include('store.form')
        </form>
    </div>
</div>
@endsection
