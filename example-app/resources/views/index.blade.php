<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<div class="container">
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('create') }}"> <i class="fa fa-plus"></i> Create New Product</a>
        </div>

        <table class="table table-striped">
            <thead>
              <tr>
              <th>id</th>
                <th>name</th>
                <th>email</th>
              </tr>
            </thead>
            <tbody>

             @foreach ($students as $ss )

              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $ss->name }}</td>
                <td>{{ $ss->email }} </td>

                <!-- <td>

                        <button class="btn btn-md btn-success me-1 p-1">edit</button>

                      <button class="btn btn-md btn-danger  p-1">delete</button>

                </td> -->
              </tr>

              @endforeach

            </tbody>
          </table>
      </div>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
