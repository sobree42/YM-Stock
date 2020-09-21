@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark ">{{__('Edit Category')}}
        </h6>
    </div>
    <div class="card-body">
        <form action="{{ route('category.update', $category->id) }}" method="post">
            @csrf
            @method('PUT')
            @include('category.form')
        </form>
    </div>
</div>
@endsection
