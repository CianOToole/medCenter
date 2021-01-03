@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as an admin. <a class="btn btn-primary" href="{{route('admin.users.index')}}">Users</a>
                    <a class="btn btn-primary" href="{{route('admin.doctors.index')}}">Doctors</a>
                    <a class="btn btn-primary" href="{{route('admin.patients.index')}}">Patients</a>
                    <a class="btn btn-primary" href="{{route('admin.visits.index')}}">Visit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection