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
        <form action="{{ route('user.doctors.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                    <label for="date">Date of Visit</label>
                    <input type="date" class="form-control" name="date" id="date" value="{{ old('date') }}" />
                </div>

                <div class="form-group">
                    <label for="time">Time of visit</label>
                    <input type="time" class="form-control" name="time" id="time" value="{{ old('time') }}" />
                </div>

                <div class="form-group">
                    <label for="patient_id">Patient</label>
                   <select name="patient_id">
                     @foreach ($roles as $role)
                        <option value="{{$role->id}}"{{(old('patient_id') == $role->id)? "selected" : ""}}>{{$role->user->name}}</option>
                   @endforeach
                   </select>
                </div>
                <div class="form-group">
                  <label for="price">Cost of Visit</label>
                  <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}" />
              </div>
                <div>
                  <a href="{{ route('user.doctors.index') }}" class="btn btn-default">Cancel</a>
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
              </form>
           </div>
        </div>
      </div>
   </div>
</div>
@endsection
