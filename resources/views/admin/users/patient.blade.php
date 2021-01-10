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
        <form action="{{ route('admin.users.makePatient', $user->id) }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <input type="hidden" name="role_id" value="3">
                <div class="form-group">
                    <label for="policy_number">Policy Number</label>
                    <input type="text" class="form-control" name="policy_number" id="policy_number" value="{{ old('policy_number') }}" />
                </div>
                <div class="form-group">
                    <label for="insurance_company">Insurance Company</label>
                    <input type="text" class="form-control" name="insurance_company" id="insurance_company" value="{{ old('insurance_company') }}" />
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
