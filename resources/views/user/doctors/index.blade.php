@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

          <p id="alert-message" class="alert collapse"></p>

            <div class="card">
                <div class="card-header">
                  Doctor 
                <a href="{{ route('user.doctors.create')}}" class="btn btn-primary float-right">Add</a>
                </div>

                <div class="card-body">
                    @if (count($visits) === 0)
                      <p>There are no Visits</p>
                    @else
                      <table id="table-books" class="table table-hover">
                        <thead>
                          <th>Day</th>
                          <th>Visit Time</th>
                          <th>Doctor</th>
                          <th>Cost</th>
                        </thead>
                        <tbody>
                          @foreach ($visits as $visit)
                            <tr data-id="{{ $visit->id }}">
                              <td>{{ $visit->visitDay }}</td>
                              <td>{{ $visit->visitTime }}</td>
                              @foreach ($doctors as $doctor)
                              @if($doctor->id == $visit->doctor_id)
                              <td>{{ $doctor->user->name }}</td>
                              @endif
                              @endforeach
                              <td>{{ $visit->price }}</td>
                              <td>
                                <a href="{{ route('user.doctors.show', $visit->id )}}" class="btn btn-primary">View</a>
                                <a href="{{ route('user.doctors.edit', $visit->id )}}" class="btn btn-warning">Edit</a>
                                <form style="display:inline-block" method="POST" action="{{ route('user.doctors.destroy', $visit->id) }}">
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
