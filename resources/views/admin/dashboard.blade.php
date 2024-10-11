@extends('admin.master')
@section('title', 'Dashboard')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{$totalUsers}}</h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <a href="{{url('/customers')}}">
                                        <span class="mdi mdi-account-star text-warning icon-item"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Total Customers</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{$totalProducts}}</h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success ">
                                    <a href="{{route('admin.products.index')}}">
                                        <span class="mdi mdi-basket text-info icon-item"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Total Products</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{$totalToLets}}</h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-success">
                                    <a href="{{route('admin.to-lets.index')}}">
                                        <span class="mdi mdi-office-building text-success icon-item"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Total To-Lets</h6>
                    </div>
                </div>
            </div>
{{--            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-9">--}}
{{--                                <div class="d-flex align-items-center align-self-start">--}}
{{--                                    <h3 class="mb-0">{{$delivered_orders}}</h3>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-3">--}}
{{--                                <div class="icon icon-box-success">--}}
{{--                                    <a href="{{route('admin.user_orders')}}">--}}
{{--                                        <span class="mdi mdi-truck-delivery text-danger icon-item"></span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <h6 class="text-muted font-weight-normal">Orders Delivered</h6>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-9">--}}
{{--                                <div class="d-flex align-items-center align-self-start">--}}
{{--                                    <h3 class="mb-0">{{$processing_orders}}</h3>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-3">--}}
{{--                                <div class="icon icon-box-success">--}}
{{--                                    <a href="{{route('admin.user_orders')}}">--}}
{{--                                        <span class="mdi mdi-autorenew icon-item"></span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <h6 class="text-muted font-weight-normal">Orders Processing</h6>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-9">--}}
{{--                                <div class="d-flex align-items-center align-self-start">--}}
{{--                                    <h3 class="mb-0">${{$revenue}}</h3>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-3">--}}
{{--                                <div class="icon icon-box-success">--}}
{{--                                    <span class="mdi mdi-codepen text-danger icon-item"></span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <h6 class="text-muted font-weight-normal">Revenue</h6>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-9">--}}
{{--                                <div class="d-flex align-items-center align-self-start">--}}
{{--                                    <h3 class="mb-0">{{$sold_products}}</h3>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-3">--}}
{{--                                <div class="icon icon-box-success">--}}
{{--                                    <span class="mdi mdi-sale text-warning icon-item"></span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <h6 class="text-muted font-weight-normal">Sold Products Amount</h6>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>

        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Doughnut chart</h4>
                        <canvas id="doughnutChart" style="height:250px"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bar chart</h4>
                        <canvas id="barChart" style="height:230px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customScripts')
    <script src="{{asset('admin/assets/js/dashboard.js')}}"></script>
    <!-- End custom js for this page -->
    <!-- Custom js for this page -->
    {{-- <script src="admin/assets/js/chart.js"></script> --}}
    <script>
        $(function() {
            /* ChartJS
             * -------
             * Data and config for chartjs
             */
            'use strict';
            var data = {
                labels: ["Users", "Products", "To-Lets"],
                datasets: [{
                    label: '# of Votes',
                    data: [
                        {!! json_encode($totalUsers) !!},
                        {!! json_encode($totalProducts) !!},
                        {!! json_encode($totalToLets) !!},
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                    ],
                    borderWidth: 1,
                    fill: false
                }]
            };

            var options = {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        },
                        gridLines: {
                            color: "rgba(204, 204, 204,0.1)"
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            color: "rgba(204, 204, 204,0.1)"
                        }
                    }]
                },
                legend: {
                    display: false
                },
                elements: {
                    point: {
                        radius: 0
                    }
                }
            };


            var doughnutPieData = {
                datasets: [{
                    data: [{!! json_encode($totalUsers) !!}, {!! json_encode($totalProducts) !!}, {!! json_encode($totalToLets) !!}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                }],

                // These labels appear in the legend and in the tooltips when hovering different arcs
                labels: [
                    'Total Customer',
                    'Total Product',
                    'Total To-Lets',
                ]
            };

            var doughnutPieOptions = {
                responsive: true,
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            };

            if ($("#barChart").length) {
                var barChartCanvas = $("#barChart").get(0).getContext("2d");
                // This will get the first returned node in the jQuery collection.
                var barChart = new Chart(barChartCanvas, {
                    type: 'bar',
                    data: data,
                    options: options
                });
            }

            if ($("#doughnutChart").length) {
                var doughnutChartCanvas = $("#doughnutChart").get(0).getContext("2d");
                var doughnutChart = new Chart(doughnutChartCanvas, {
                    type: 'doughnut',
                    data: doughnutPieData,
                    options: doughnutPieOptions
                });
            }
        });
    </script>
@endsection
