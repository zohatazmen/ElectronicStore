@extends('backend.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <!-- Shops Stats -->
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Total Shops: {{ $shopCount }}</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('admin.shops.index') }}">View
                                Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <!-- Orders Stats -->
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Total Orders: {{ $orderCount }}</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('admin.orders.index') }}">View
                                Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <!-- Wishlists Stats -->
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Total Wishlists: {{ $wishlistCount }}</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('admin.wishlists.index') }}">View
                                Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <!-- Contacts Stats -->
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Total Contacts: {{ $contactCount }}</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('admin.contacts.index') }}">View
                                Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            Area Chart
                        </div>
                        <div class="card-body">
                            <canvas id="myAreaChart" width="100%" height="40"></canvas>
                            <script>
                                var ctx = document.getElementById('myAreaChart').getContext('2d');
                                var myAreaChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: @json($months),
                                        datasets: [{
                                            label: 'Orders by Month',
                                            data: @json($orderCounts),
                                            backgroundColor: 'rgba(78, 115, 223, 0.2)',
                                            borderColor: 'rgba(78, 115, 223, 1)',
                                            borderWidth: 2
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            x: {
                                                beginAtZero: true
                                            },
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Bar Chart
                        </div>
                        <div class="card-body">
                            <canvas id="myBarChart" width="100%" height="40"></canvas>
                            <script>
                                var ctx = document.getElementById('myBarChart').getContext('2d');
                                var myBarChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: ['Shops', 'Orders', 'Wishlists', 'Contacts'],
                                        datasets: [{
                                            label: 'Counts',
                                            data: [{{ $shopCount }}, {{ $orderCount }}, {{ $wishlistCount }},
                                                {{ $contactCount }}
                                            ],
                                            backgroundColor: ['#007bff', '#ffc107', '#28a745', '#dc3545'],
                                            borderColor: ['#007bff', '#ffc107', '#28a745', '#dc3545'],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            x: {
                                                beginAtZero: true
                                            },
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
