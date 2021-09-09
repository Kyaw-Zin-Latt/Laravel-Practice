@extends("layouts.app")


@section("head")

    <style>
        .article-thumbnail{
            width: 150px ;
            height: 150px;
            border-radius: 5px;
            display: inline-block;
            background-size: cover;
        }
    </style>

@endsection
@section("content")

    <div class="container">
        <div class="row">
            <div class="col-12">
                @component("component.breadcrumb")
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route("article.index") }}">Article</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update Article</li>
                @endcomponent
                <div class="card">
                    <div class="card-header">
                        Update Article
                    </div>
                    <div class="card-body">
                        <form id="article-form" action="{{ route("article.update",$article->id) }}" method="post">
                            @csrf
                            @method("put")
                            <div class="row">
                                <div class="col-12">
                                    <label for="title">Title</label>
                                    <input type="text" value="{{ $article->title }}" name="title" class="form-control @error("title") is-invalid @enderror">
                                    @error("title") <small class="text-danger font-weight-bold">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-12">
                                    <label for="description">Description</label>
                                    <textarea class="form-control @error("title") is-invalid @enderror" name="description" id="description" rows="10">{{ $article->description }}</textarea>
                                    @error("description") <small class="text-danger font-weight-bold">{{ $message }}</small> @enderror

                                </div>

                            </div>
                            <br>
                            <button class="btn btn-outline-primary" form="article-form">Update Article</button>
                        </form>
                        <hr>
                        @foreach($article->getPhotos as $p)
                            <div class="d-inline-block">
                                <div class="article-thumbnail" style="background-image: url('{{ asset("storage/article/".$p->location) }}')"></div>
                                <form class="" action="{{ route("photo.destroy",$p->id) }}" method="post">
                                    @csrf
                                    @method("delete")
                                    <button class="btn btn-danger" style="margin-top: -80px; margin-left: 5px">Delete</button>
                                </form>
                            </div>
                        @endforeach
                        <form action="{{ route("photo.store") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-6">
                                    <input type="hidden" name="article_id" value="{{ $article->id }}">
                                    <input type="file" name="photo[]" class="form-control" multiple required>
                                    @error("photo.*") <small class="text-danger font-weight-bold">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-6">
                                    <button class="col-3 btn btn-primary">Update Photo</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
