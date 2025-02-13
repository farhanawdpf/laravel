@extends('master')
@section('content')

<h1>Relationship ->Has One Through</h1>
<div class="container">
        <table class="table table-striped">
            <thead>
              <tr>
                  <th>MechanicS</th>
                  <th>Car Model</th>
                 <th>Owners</th>

              </tr>
            </thead>
            <tbody>
                @foreach( $mechanic as $data)
              <tr>
                <td>{{ $data->name}}</td>
                <td>{{ $data->car->model}}</td>
                <td>{{ $data->carOwner->name}}</td>




              </tr>
               @endforeach
            </tbody>
          </table>
      </div>

@endsection
