@extends('master')
@section('content')

<h1>Relationship ->Has Many Through</h1>
<div class="container">
        <table class="table table-striped">
            <thead>
              <tr>
                <th>Project</th>
                <th>Deployment</th>
                <th>Environment</th>

              </tr>
            </thead>
            <tbody>
                @foreach( $project as $data)
              <tr>
                <td>{{ $data->name}}</td>
                <td>
                @foreach( $data->deployments as $c)

                {{ $c->commit_hash}} <br/>

                @endforeach
               </td>

               <td>{{ $data->environment->count()}}</td>
              </tr>
               @endforeach
            </tbody>
          </table>
      </div>

@endsection
