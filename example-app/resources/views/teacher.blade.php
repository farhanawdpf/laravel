<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="container">
        <table class="table table-striped">
            <thead>
              <tr>
              <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>class</th>
                <th>student name</th>
              </tr>
            </thead>
            <tbody>

             @foreach ($students as $teacher )

              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->email }} </td>

                <!-- <td>

                        <button class="btn btn-md btn-success me-1 p-1">edit</button>

                      <button class="btn btn-md btn-danger  p-1">delete</button>

                </td> -->
              </tr>

              @endforeach

            </tbody>
          </table>
      </div>
    <!-- <table border="1" width="800">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>class</th>
        <th>student name</th>
    </tr>
    <tr>
        @if(!empty($teachers))
        @foreach($teachers as $teacher)
        <td>{{$teacher->id}}</td>
        <td>{{$teacher->name}}</td>
        <td>{{$teacher->email}}</td>
        <td>{{$teacher->className}}</td>
        <td>{{$teacher->studntname}}</td>
        @endforeach
        @endif
    </tr>
    </table> -->
</body>
</html>
