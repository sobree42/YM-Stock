@extends('layouts.app')

@section('style')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
@if (\Session::has('success'))
    <div class="alert alert-success">
        {!! \Session::get('success') !!}
    </div>
@endif
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark ">{{__('Transaction')}}</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{__('No.')}}</th>
                        <th>{{__('Product')}}</th>
                        <th>{{__('Quantity')}}</th>
                        <th>{{__('Total Quantity')}}</th>
                        <th>{{__('Price')}}</th>
                        <th>{{__('User')}}</th>
                        <th>{{__('Date')}}</th>
                        <th>{{__('Status')}}</th>
                    </tr>
                </thead>

                <tbody>
                    @for ($i = 0; $i < count($transactios); $i++)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $transactios[$i]->product->name}}</td>
                        <td>{{ $transactios[$i]->quantity." ".$transactios[$i]->product->unit_type->type }}</td>
                        <td>{{ $transactios[$i]->total_quantity." ".$transactios[$i]->unit_type_id }}
                        <td>{{ $transactios[$i]->price}}
                        <td>{{ $transactios[$i]->user->name}}</td>
                        <td>{{ $transactios[$i]->created_at->format('d/m/Y') }}</td>
                        <td><span class="badge badge-dark">{{$transactios[$i]->status}}</span></td>
                    </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>


<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });

</script>
@endsection
