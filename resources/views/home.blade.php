<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@extends('layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class=" text-center">

    </div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">{{__('Dashboard')}}</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        @if ( auth()->user()->position === 1)
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"">{{__('Products')}}</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $products }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-boxes fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
          <div class="card-footer bg-transparent border-muted">
              <a href="{{ url('product')}}" style="text-decoration: none;"
              class="text-xs font-weight-bold text-primary text-uppercase mb-1">
              {{__('More info')}} <i class="fa fa-arrow-circle-right"></i></a></div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">{{__('Staffs')}}</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
          <div class="card-footer bg-transparent border-muted">
               <a href="{{ url('user')}}" style="text-decoration: none;"
               class="text-xs font-weight-bold text-primary text-uppercase mb-1">
               {{__('More info')}} <i class="fa fa-arrow-circle-right"></i></a></div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-dark shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">{{__('Stores')}}</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stores }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-store fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
          <div class="card-footer bg-transparent border-muted">
               <a href="{{ url('store')}}" style="text-decoration: none;"
               class="text-xs font-weight-bold text-primary text-uppercase mb-1">
               {{__('More info')}} <i class="fa fa-arrow-circle-right"></i></a></div>
        </div>
      </div>
      @endif
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{__('Stock In')}}</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stock_in }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-box fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
          <div class="card-footer bg-transparent border-muted">
               <a href="{{route('transaction.index')}}" style="text-decoration: none;"
               class="text-xs font-weight-bold text-primary text-uppercase mb-1">
               {{__('More info')}} <i class="fa fa-arrow-circle-right"></i></a></div>
        </div>
      </div>


      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-secondary  shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">{{__('Stock Out')}}</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stock_out }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-box-open fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
          <div class="card-footer bg-transparent border-muted">
               <a href="{{route('transaction.index')}}" style="text-decoration: none;"
               class="text-xs font-weight-bold text-primary text-uppercase mb-1">
               {{__('More info')}} <i class="fa fa-arrow-circle-right"></i></a></div>
        </div>
      </div>

      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"">{{__('Corrupt Material')}}</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $corrupt_material }}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>

              </div>
            </div>
          </div>
          <div class="card-footer bg-transparent border-muted">
              <a href="{{route('transaction.index')}}" style="text-decoration: none;"
              class="text-xs font-weight-bold text-primary text-uppercase mb-1">
              {{__('More info')}} <i class="fa fa-arrow-circle-right"></i></a></div>
        </div>
      </div>

    </div>
</div>



@endsection
</html>
