@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

          <p id="alert-message" class="alert collapse"></p>

            <div class="card">
                <div class="card-header">
                  Books
                <a href="{{ route('admin.users.create')}}" class="btn btn-primary float-right">Add</a>
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
                          @foreach ($users as $user)
                            <tr data-id="{{ $user->id }}">
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              @foreach ($roles as $role)
                                @if($user->id == $role->role_id)
                                  <td>{{$role->name}}</td>         
                                @else
                                  <td>{{ "No Role"}}</td>
                                @endif
                              @endforeach
                              <td>{{ $user->address }}</td>
                              <td>{{ $user->phone }}</td>
                              <td>
                                <a href="{{ route('admin.users.show', $user->id )}}" class="btn btn-primary">View</a>
                                <a href="{{ route('admin.users.edit', $user->id )}}" class="btn btn-warning">Edit</a>
                                <form style="display:inline-block" method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
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
