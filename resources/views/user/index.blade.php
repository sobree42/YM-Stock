@extends('layouts.app')

@section('style')
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
@if (\Session::has('success'))
    <div class="alert alert-success">
        {!! \Session::get('success') !!}
    </div>
@endif
@if (\Session::has('warning'))
    <div class="alert alert-warning">
        {!! \Session::get('warning') !!}
    </div>
@endif
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark ">{{__('Staff Management')}}</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{__('No.')}}</th>
                        <th>{{__('Name')}}</th>
                        <th>{{__('Email')}}</th>
                        <th>{{__('Phone')}}</th>
                        <th>{{__('Gender')}}</th>
                        <th>{{__('Action')}}</th>
                    </tr>
                </thead>

                <tbody>
                    @for ($i = 0; $i < count($users); $i++)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $users[$i]->name }}</td>
                        <td>{{ $users[$i]->email }}</td>
                        <td>{{ $users[$i]->phone }}</td>
                        <td>{{ $users[$i]->gender }}</td>
                        <td>
                            <form action="{{ route('user.destroy', $users[$i]->id) }}" method="post" id="formDel{{ $users[$i]->id }}">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info" href="{{ route('user.edit', $users[$i]->id) }}"><i class="fas fa-fw fa-pen"></i></a >
                                <button class="btn btn-danger" onclick="confirmationBox({{ $users[$i]->id }});return false"><i class="fas fa-fw fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });

    const confirmationBox = (id) => {
        Swal.fire({
            title: "{{__('Are you sure?')}}",
            text: "{{__('You want not be able to revert this!')}}",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "{{__('Yes, delete it!')}}",
            cancelButtonText: "{{__('No, cancel it!')}}"
        }).then((result) => {
            if (result.value) {
                $('#formDel' + id).submit();
            }
        })
    }

</script>
@endsection
