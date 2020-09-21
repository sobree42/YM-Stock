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
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark ">Report Graph</h6>
    </div>
    <!-- Area Chart -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
      </div>
      <div class="card-body">
        <div class="chart-area">
          <canvas id="myAreaChart"></canvas>
        </div>
        <hr>
        Styling for the area chart can be found in the <code>/js/demo/chart-area-demo.js</code> file.
      </div>
    </div>

    </div>
@endsection

@section('script')
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{ asset('js/demo/chart-area-demo.js')}}"></script>

<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });

</script>
@endsection
