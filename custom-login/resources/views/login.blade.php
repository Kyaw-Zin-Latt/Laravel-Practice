<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
</head>
<body>


<div class="container">
    <div class="row my-5 justify-content-center">
        <div class="col-4">
            <div class="card shadow">
                <div class="card-header">
                    <h3>Login</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route("login") }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="">Email OR Phone</label>
                            <input type="text" name="name" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="">Password</label>
                            <input type="password" name="password" required class="form-control">
                        </div>
                        <button class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>

