<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<div class="container">
    <div class="row my-4">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h3>Add New Item</h3>
                    </div>
                    <form action="{{ route('form.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Item Name</label>
                            <input type="text" name="name" class="form-control">
                            @error('name')
                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="col-6">
                                <label for="">Price (MMK)</label>
                                <input type="number" name="price" class="form-control">
                                @error('price')
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="">Stock (Price)</label>
                                <input type="number" name="stock" class="form-control">
                                @error('stock')
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary ">Save Item</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
