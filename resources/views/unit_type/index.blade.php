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
        <h6 class="m-0 font-weight-bold text-dark ">{{__('Unit Type Management')}}</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{__('No.')}}</th>
                        <th>{{__('Name')}}</th>
                        <th>{{__('Action')}}</th>
                    </tr>
                </thead>

                <tbody>
                    @for ($i = 0; $i < count($unit_types); $i++)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $unit_types[$i]->type }}</td>
                        <td>
                            <form action="{{ route('unit_type.destroy', $unit_types[$i]->id) }}" method="post" id="formDel{{ $unit_types[$i]->id }}">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info " href="{{ route('unit_type.edit', $unit_types[$i]->id) }}"><i class="fas fa-fw fa-pen"></i></a >
                                <button class="btn btn-danger" onclick="confirmationBox({{ $unit_types[$i]->id }});return false"><i class="fas fa-fw fa-trash-alt"></i></button>
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
