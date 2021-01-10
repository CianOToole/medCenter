@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                  Book {{ $user->name }}
                </div>

                <div class="card-body">
                      <table class="table table-hover">
                        <tbody>
                            <tr>
                              <td>Name</td>
                              <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                              <td>email</td>
                              <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                              <td>address</td>
                              @foreach ($role as $r)
                              <td>{{ $r->role->name }}</td>
                              @endforeach
                            </tr>
                            <tr>
                              <td>phone</td>
                              <td>{{ $user->address }}</td>
                            </tr>
                        </tbody>
                      </table>
                    <a href="{{ route('admin.users.index')}}" class="btn">Back</a>
                    <a href="{{ route('admin.users.edit', $user->id)}}" class="btn btn-secondary">Edit</a>
                    <form style="display:inline-block" method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="form-control btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
