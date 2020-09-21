@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark ">Corrupt Material
        </h6>
    </div>
    <div class="card-body">
        <form action="{{ route('corrupt-material.store', $id) }}" method="post">
            @csrf
            @include('stock.form')
        </form>
    </div>
</div>
@endsection
