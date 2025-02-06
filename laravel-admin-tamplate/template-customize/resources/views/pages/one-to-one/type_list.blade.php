@extends('master')
@section('content')

<h1>Relationship ->one to one</h1>
<div class="container">
        <table class="table table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>Detais</th>
                <th>Sub Types</th>
                <th>Note</th>

              </tr>
            </thead>
            <tbody>
                @foreach( $types as $data)
              <tr>
                <td>{{ $data->name}}</td>
                <td>{{ $data->details}}</td>
                <td>{{ $data->subtype->name}}</td>
                <td>{{ $data->subtype->note}}</td>

              </tr>
               @endforeach
            </tbody>
          </table>
      </div>

@endsection
