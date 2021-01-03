@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                  Doctor {{ $visit->name }}
                </div>

                <div class="card-body">
                      <table class="table table-hover">
                        <tbody>
                            <tr>
                              <td>Day</td>
                              <td>{{ $visit->visitDay }}</td>
                            </tr>
                            <tr>
                              <td>Time</td>
                              <td>{{ $visit->visitTime }}</td>
                            </tr>
                            <tr>
                              <td>Dcotor</td>
                              @foreach ($role as $r)
                              <td>{{ $r->user->name }}</td>
                              @endforeach
                            </tr>
                        </tbody>
                      </table>
                    <a href="{{ route('admin.visits.index')}}" class="btn">Back</a>
                    <a href="{{ route('admin.visits.edit', $visit->id)}}" class="btn btn-secondary">Edit</a>
                    <form style="display:inline-block" method="POST" action="{{ route('admin.visits.destroy', $visit->id) }}">
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
