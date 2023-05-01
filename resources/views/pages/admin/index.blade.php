@extends('pages.admin.layouts.layout')
@section('content')
    <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                              <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Dashboard</h1>
                    </div>

                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                @can('admin')

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <!-- title -->
                                    <div class="d-md-flex">
                                        <div>
                                            <h4 class="card-title">Top 3 Selling Products</h4>
                                            <h5 class="card-subtitle">Overview of Top Selling Items</h5>
                                        </div>
                                        {{-- <div class="ms-auto">
                                            <div class="dl">
                                                <select class="form-select shadow-none">
                                                    <option value="0" selected>Monthly</option>
                                                    <option value="1">Daily</option>
                                                    <option value="2">Weekly</option>
                                                    <option value="3">Yearly</option>
                                                </select>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <!-- title -->
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-hover align-middle text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="border-top-0">Products</th>
                                                    <th class="border-top-0">Price</th>
                                                    <th class="border-top-0">Seller</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($bestseller as $b)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="m-r-10">
                                                                    <img src="{{asset('admin/assets/images/users/1.jpg')}}" alt="" class="d-flex" width="50px">
                                                                </div>
                                                                <div class="">
                                                                    <h4 class="m-b-0 font-16">{{$b->name}}</h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{$b->price}}</td>
                                                        <td>{{$b->user->name}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                @endcan
                @can('seller')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex">
                                    <div>
                                        <h4 class="card-title">Top 3 Selling Products</h4>
                                        <h5 class="card-subtitle">Overview of Top Selling Items</h5>
                                    </div>
                                    {{-- <div class="ms-auto">
                                        <div class="dl">
                                            <select class="form-select shadow-none">
                                                <option value="0" selected>Monthly</option>
                                                <option value="1">Daily</option>
                                                <option value="2">Weekly</option>
                                                <option value="3">Yearly</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                </div>
                                <!-- title -->
                                <div class="table-responsive">
                                    <table class="table mb-0 table-hover align-middle text-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Products</th>
                                                <th class="border-top-0">Price</th>
                                                <th class="border-top-0">Total Sales</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bestseller as $b)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="m-r-10">
                                                                <img src="{{asset('admin/assets/images/users/1.jpg')}}" alt="" class="d-flex" width="50px">
                                                            </div>
                                                            <div class="">
                                                                <h4 class="m-b-0 font-16">{{$b->name}}</h4>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{$b->price}}</td>
                                                    <td>{{$b->penjualan}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @endcan


@endsection
