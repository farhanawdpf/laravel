<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, Crud!</title>
  </head>
  <body>
      <div class="text-center">
        <h1>Hello, Crud!</h1>
        <p>This is a simple CRUD application.</p>

      </div>

      <div class="container">
        <form method="POST" action="{{ route('addProduct') }}">
          @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">first Name</label>
              <input type="text" name="name" class="form-control"  required>
              
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">contact</label>
                <input type="text" name="contact_id" class="form-control" >
                
              </div>

              
            <div class="mb-3">
                <label for="drt" class="form-label">E-mail</label>
                <input type="text" name="details" class="form-control">
              </div>
          
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
