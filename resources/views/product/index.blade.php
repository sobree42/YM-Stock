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
        <h6 class="m-0 font-weight-bold text-dark ">{{__('Product Management')}}</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{__('No.')}}</th>
                        <th>{{__('Name')}}</th>
                        <th>{{__('Brand')}}</th>
                        <th>{{__('Category')}}</th>
                        <th>{{__('Store')}}</th>
                        <th>{{__('Quantity')}}</th>
                        <th>{{__('Status')}}</th>
                        <th>{{__('Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($products); $i++)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $products[$i]->name }}</td>
                        <td>{{ $products[$i]->brand->name }}</td>
                        <td>{{ $products[$i]->category->name }}</td>
                        <td>{{ $products[$i]->store->name }}</td>
                        @if (isset($products[$i]->last_transaction[0]))
                        <td>{{ $products[$i]->last_transaction[0]->total_quantity." ".$products[$i]->unit_type->type }}</td>
                        <td><span class="badge {{ $products[$i]->last_transaction[0]->total_quantity > 0 ? 'badge-success' : 'badge-warning' }}">
                            {{ __($products[$i]->last_transaction[0]->total_quantity > 0 ? 'In stock' : 'Out of stock') }}
                        </span></td>
                        @else
                        <td>0 {{$products[$i]->unit_type->type}}</td>
                        <td><span class="badge badge-warning">{{__('Out of stock')}}</span></td>
                        @endif

                        <td>
                            <form action="{{ route('product.destroy', $products[$i]->id) }}" method="post" id="formDel{{ $products[$i]->id }}">
                                @csrf
                                @method('DELETE')

                                  <!-- Example single danger button -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-facebook dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-fw fa-tasks"></i></button>
                                    <div class="dropdown-menu ">
                                    <a class="dropdown-item  text-dark" href="{{ route('stock-in.create',$products[$i]->id) }}">{{__('Stock In')}}</a>
                                    <a class="dropdown-item  text-dark" href="{{ route('stock-out.create',$products[$i]->id) }}">{{__('Stock Out')}}</a>
                                    <a class="dropdown-item  text-dark" href="{{ route('corrupt-material.create',$products[$i]->id) }}">{{__('Corrupt Material')}}</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-dark " href="{{ route('product.edit', $products[$i]->id) }}"><i class="fas fa-fw fa-pen"></i> {{__('Edit')}}</a >
                                    <button class=" dropdown-item text-danger" onclick="confirmationBox({{ $products[$i]->id }});return false"> <i class="fas fa-fw fa-trash-alt"></i> {{__('Delete')}}</button>
                                    </div>
                                </div>

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
