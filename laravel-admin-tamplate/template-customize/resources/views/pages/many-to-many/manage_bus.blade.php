@extends('master')
@section('content')

<h1>Relationship ->Many to Many</h1>
<div class="container">
        <table class="table table-striped">
            <thead>
              <tr>
                  <th>Tickets</th>
                <th>Bus</th>

              </tr>
            </thead>
            <tbody>
                @foreach( $buses as $data)
              <tr>
                <td>{{ $data->name}}</td>
                <td>

                @foreach( $data->buses as $b)
                    {{ $b->name}} <br/>
                @endforeach

                </td>



              </tr>
               @endforeach
            </tbody>
          </table>
      </div>

@endsection
