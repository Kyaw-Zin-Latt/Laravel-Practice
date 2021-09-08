@extends("layouts.app")

@section("content")

    <div class="container">
        <div class="row">
            <div class="col-5">
                @component("component.breadcrumb")
                    <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                @endcomponent
                <div class="card">
                    <div class="card-header">
                        Edit Profile
                    </div>
                    <div class="card-body">
                        <form action="{{ route("profile.update") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <label for="title">Title</label>
                                    <input type="file" value="{{ old("title") }}" name="photo" class="form-control @error("photo") is-invalid @enderror">
                                    @error("photo") <small class="text-danger font-weight-bold">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-outline-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
