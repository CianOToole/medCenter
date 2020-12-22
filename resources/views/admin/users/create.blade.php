@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
     <div class="card">
       <div class="card-header">
         Add new user
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
        <form action="{{ route('admin.users.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" />
                </div>

                <div class="form-group">
                    <label for="address">address</label>
                    <input type="text" class="form-control" name="address" id="address" value="{{ old('address') }}" />
                </div>

                <div class="form-group">
                    <label for="publisher">Role</label>
                   <select name="role_id">
                     @foreach ($roles as $role)
                        <option value="{{$role->id}}"{{(old('role_id') == $role->id)? "selected" : ""}}>{{$role->name}}</option>
                   @endforeach
                   </select>
                </div>

                <div class="form-group">
                    <label for="phone">phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}" />
                </div>

                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}" />
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
