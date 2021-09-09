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
                        <h3>Update Item</h3>
                    </div>
                    @if (session('status'))
                        <p class="alert alert-success">{{ session('status') }}</p>
                    @endif
                    <form action="{{ route('form.update',$currentItem->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Item Name</label>
                            <input type="text" name="name" value="{{ $currentItem->name }}" class="form-control">
                            @error('name')
                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="col-6">
                                <label for="">Price (MMK)</label>
                                <input type="number" value="{{ $currentItem->price }}" name="price" class="form-control">
                                @error('price')
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="">Stock (Price)</label>
                                <input type="number" value="{{ $currentItem->stock }}" name="stock" class="form-control">
                                @error('stock')
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary ">Update Item</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(session('deleteStatus'))
                        <p class="alert alert-success">{{ session('deleteStatus') }}</p>
                    @endif
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Control</th>
                            <th>Date / Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach (\App\Item::all() as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->stock }}</td>
                                <td>
                                    <a href="{{ route('form.destroy',$item->id) }}" class="btn btn-danger">Delete</a>
                                    <a href="{{ route('form.edit',$item->id) }}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>{{ $item->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
