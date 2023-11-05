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
        <table class="table table-striped">
            <thead>
              <tr>
              <th>Id</th>
                <th>Product Name</th>
                <th>Contact Name</th>
                <th>contact</th>
                <th>details</th>
                <th>Date & Time</th>
              </tr>
            </thead>
            <tbody>

             @foreach ($products as $product) 
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->contactName }} </td>
                <td>{{ $product->phone }}</td>
                <td>{{ $product->details }}</td>
                <td>{{ $product->created_at }}</td>

                <!-- <td>
                    
                        <button class="btn btn-md btn-success me-1 p-1">edit</button>
                    
                      <button class="btn btn-md btn-danger  p-1">delete</button>
               
                </td> -->
              </tr>

              @endforeach

            </tbody>
          </table>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>