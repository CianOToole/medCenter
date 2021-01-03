@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

          <p id="alert-message" class="alert collapse"></p>

            <div class="card">
                <div class="card-header">
                  Doctors
                <a href="{{ route('admin.patients.create')}}" class="btn btn-primary float-right">Add</a>
                </div>

                <div class="card-body">
                    @if (count($users) === 0)
                      <p>There are no books</p>
                    @else
                      <table id="table-books" class="table table-hover">
                        <thead>
                          <th>name</th>
                          <th>email</th>
                          <th>Role</th>
                          <th>address</th>
                          <th>phone</th>
                        </thead>
                        <tbody>
                          @foreach ($roles as $role)
                            <tr data-id="{{ $role->user->id }}">
                              <td>{{ $role->user->name }}</td>
                              <td>{{ $role->user->email }}</td>
                                @if($role->user->id == $role->user_id)
                                  <td>{{$role->role->name}}</td>         
                                @else
                                  <td>{{ "No Role"}}</td>
                                @endif
                              <td>{{ $role->user->address }}</td>
                              <td>{{ $role->user->phone }}</td>
                              <td>
                                <a href="{{ route('admin.patients.show', $role->user->id )}}" class="btn btn-primary">View</a>
                                <a href="{{ route('admin.patients.edit', $role->user->id )}}" class="btn btn-warning">Edit</a>
                                <form style="display:inline-block" method="POST" action="{{ route('admin.patients.destroy', $role->user->id) }}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="form-control btn btn-danger">Delete</button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
