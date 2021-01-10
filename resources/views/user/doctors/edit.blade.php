@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
     <div class="card">
       <div class="card-header">
         Edit Doctor
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
        <form action="{{ route('user.doctors.update', $visit->id) }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                  <label for="date">Date of Visit</label>
                  <input type="date" class="form-control" name="date" id="date" value="{{ old('date', $visit->visitDay) }}" />
              </div>

              <div class="form-group">
                  <label for="time">Time of visit</label>
                  <input type="time" class="form-control" name="time" id="time" value="{{ old('time', $visit->visitTime) }}" />
              </div>

              <div class="form-group">
                  <label for="patient_id">Doctor</label>
                 <select name="patient_id">
                   @foreach ($doctors as $doctor)
                      <option value="{{$doctor->id}}"{{(old('patient_id') == $doctor->id)? "selected" : ""}}>{{$doctor->user->name}}</option>
                 @endforeach
                 </select>
              </div>
              <div class="form-group">
                <label for="time">Cost of Visit</label>
                <input type="text" class="form-control" name="price" id="price" value="{{ old('price', $visit->price) }}" />
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
