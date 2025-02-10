@extends('master')
@section('content')

<h1>Relationship ->one to Many</h1>
<div class="container">
        <table class="table table-striped">
            <thead>
              <tr>
                <th>Post</th>
                <th>comments</th>


              </tr>
            </thead>
            <tbody>
                @foreach( $comments as $data)
              <tr>
                <td>{{ $data->name}}</td>
                <td>
                @foreach( $data->comments as $c)

                {{ $c->name}} <br/>

                @endforeach
               </td>


              </tr>
               @endforeach
            </tbody>
          </table>
      </div>

@endsection
