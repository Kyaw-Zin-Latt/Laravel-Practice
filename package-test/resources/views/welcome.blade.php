<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset("bootstrap/dist/css/bootstrap.min.css") }}">
</head>
<body>


<div class="container">
    <div class="row">
        <form action="{{ route("logout") }}" method="post">
            @csrf
            <button class="btn btn-outline-danger">Logout</button>
        </form>
        <div class="col-12 my-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="" class="form-label">Upload Photo</label>
                        <div class="row g-1">
                            <div class="col-8">
                                <input type="file" name="photo" class="form-control me-2 col-7" required>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-outline-primary form-control">Upload</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="border rounded bg-white p-4 mt-5">
                <h4>Photo List</h4>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @foreach(File::files('edited') as $photo)
                                <div class="col-4">
                                    <img src="{{ asset($photo) }}" class="img-fluid rounded w-100" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
