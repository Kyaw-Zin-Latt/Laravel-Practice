@extends("layouts.app")

@section("content")

    <div class="container">
        <div class="row">
            <div class="col-12">
                @component("component.breadcrumb")
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route("article.index") }}">Article</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Article</li>
                @endcomponent
                <div class="card">
                    <div class="card-header">
                        Add Article
                    </div>
                    <div class="card-body">
                        <form action="{{ route("article.store") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <label for="title">Title</label>
                                    <input type="text" value="{{ old("title") }}" name="title" class="form-control @error("title") is-invalid @enderror">
                                    @error("title") <small class="text-danger font-weight-bold">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-12">
                                    <label for="photo">Upload Photo</label>
                                    <input class="form-control" type="file" id="photo" name="photo[]" multiple>
                                    @error("photo.*") <small class="text-danger font-weight-bold">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-12">
                                    <label for="description">Description</label>
                                    <textarea class="form-control @error("title") is-invalid @enderror" name="description" id="description" rows="10">{{ old("description") }}</textarea>
                                    @error("description") <small class="text-danger font-weight-bold">{{ $message }}</small> @enderror

                                </div>

                            </div>
                            <br>
                            <button class="btn btn-outline-primary">Add New Article</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
