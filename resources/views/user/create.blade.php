@extends('layouts.app')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark ">{{__('Create Staff')}}
        </h6>
    </div>
    <div class="card-body">
        <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('user.form')
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('.custom-file-input').on('change', function () {
            let size = this.files[0].size
            if (size > 2000000) {
                alert('Image size is too big.')
                return false;
            }
            let fileName = $(this).val().split('\\').pop()
            $(this).next('.custom-file-label').addClass("selected").text(imageName(fileName))
        })
    })

    function imageName(fileName) {
        if (fileName.length > 20) {
            return fileName.substr(0, 20) + '...'
        } else {
            return fileName
        }
    }

</script>
@endsection
