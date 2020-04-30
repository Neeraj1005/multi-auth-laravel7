@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-light">
                        <thead class="thead-light">
                            <tr>
                                <th>UserId</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        <x-active type="error" :users="$users"/>

                        </tbody>
                    </table>
                </div>

                <div class="card-footer">

                    Roles: {{auth()->user()->role->name}}<br>
                    You are logged in Admin Dashboard!

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
