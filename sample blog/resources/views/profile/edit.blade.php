@extends("layouts.app")

@section('head')

    <style>
        .article-thumbnail {
            width: 160px;
            height: 160px;
            border-radius: 5px;
            display: inline-block;
            background-size: cover;
        }

    </style>

@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                @component('component.breadcrumb')
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                @endcomponent
            </div>
            <div class="col-5">

                <div class="card">
                    <div class="card-header">
                        Edit Profile
                    </div>
                    <div class="card-body">
                        <img class="w-100 rounded" src="{{ asset('storage/profile/' . Auth::user()->photo) }}" alt="">
                        <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <label for="title">Choose Photo</label>
                                    <input type="file" value="{{ old('title') }}" name="photo"
                                        class="form-control @error('photo') is-invalid @enderror">
                                    @error('photo') <small class="text-danger font-weight-bold">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-outline-primary w-100">Update Profile</button>
                        </form>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.changePassword') }}">
                            @csrf

                            @foreach ($errors->all() as $error)
                                <p class="text-danger">{{ $error }}</p>
                            @endforeach

                            <div class="form-group">
                                <label for="password" class="___class_+?19___">Current Password</label>


                                <input id="password" type="password" class="form-control" name="current_password"
                                    autocomplete="current-password">

                            </div>

                            <div class="form-group">
                                <label for="password"
                                    class="">New Password</label>

                                <input id=" new_password"
                                    type="password" class="form-control" name="new_password"
                                    autocomplete="current-password">
                            </div>

                            <div class="form-group">
                                <label for="password" class="___class_+?27___">New Confirm
                                    Password</label>

                                <input id="new_confirm_password" type="password" class="form-control"
                                    name="new_confirm_password" autocomplete="current-password">
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="w-100 btn btn-primary">
                                    Update Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-7">
                @foreach (Auth::user()->getPhoto as $p)
                    <div class="article-thumbnail"
                        style="background-image: url('{{ asset('storage/article/' . $p->location) }}')"></div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
