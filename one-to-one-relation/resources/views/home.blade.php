<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="text-center">
        <h1>Relationship ->one to one</h1>
        <br>
          <button class="btn btn-md btn-success"> Create</button>
        </a>


      </div>
<div class="container">
        <table class="table table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>Detais</th>
                <th>product name</th>
                <th>product Price</th>
                <th>Category Id</th>
              </tr>
            </thead>
            <tbody>
                @foreach( $products as $data)
              <tr>
                <td>{{ $data->name}}</td>
                <td>{{ $data->detais}}</td>
                <td>{{ $data->product->name}}</td>
                <td>{{ $data->product->price}}</td>
                <td>{{ $data->product->category_id}}</td>
                <td></td>
              </tr>
               @endforeach
            </tbody>
          </table>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>