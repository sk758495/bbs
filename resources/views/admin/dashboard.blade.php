@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<h2>Welcome, Admin</h2>
<p class="text-muted">You are logged in to the admin dashboard.</p>

<div class="row">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Total Products</h5>
                <p class="card-text display-6">125</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Total Users</h5>
                <p class="card-text display-6">{{ $totalUsers }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Orders Today</h5>
                <p class="card-text display-6">42</p>
            </div>
        </div>
    </div>
</div>
@endsection
