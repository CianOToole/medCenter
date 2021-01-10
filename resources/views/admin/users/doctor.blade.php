@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
     <div class="card">
       <div class="card-header">
         Edit User
       </div>

       <div class="card-body">
         @if($errors->any())
             <div class="alert alert-danger">
               <ul>
                 @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                 @endforeach
               </ul>
             </div>
         @endif
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name) }}" />
                </div>
                <div class="form-group">
                    <label for="address">address</label>
                    <input type="text" class="form-control" name="address" id="address" value="{{ old('address', $user->address) }}" />
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                   <select name="role_id">
                     @foreach ($roles as $role)
                        <option value="{{$role->id}}"{{(old('role_id', $user->id) == $role->user_id) ? "selected" : ""}}>{{$role->role->name}}</option>
                     @endforeach
                   </select>
                </div>
                <div class="form-group">
                    <label for="year">Year</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" />
                </div>
                <div class="form-group">
                    <label for="email">ISBN</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{ old('emails', $user->email) }}" />
                </div>
                <div>
                  <a href="{{ route('admin.users.index') }}" class="btn btn-default">Cancel</a>
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
              </form>
           </div>
        </div>
      </div>
   </div>
</div>
@endsection
