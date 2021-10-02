@extends('layouts.app')

@section("title") Edit Article @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Article</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Article</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body mb-0">
                    <h4 class="mb-0">
                        <i class="fas fa-edit"></i>
                        Edit Article
                    </h4>
                    <form action="{{ route("article.update",$article->id) }}" id="editArticle" method="post" class="">
                        @csrf
                        @method("put")

                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <label for="validationDefault04">Select Category</label>
                        <select form="editArticle" name="category" class="custom-select @error("description0") is-invalid @enderror" id="validationDefault04">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $article->category_id == old("category",$article->category->id) ? "selected" : "" }}>{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error("category")
                        <small class="text-danger font-weight-bold">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 mt-3 p-0">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="validationDefault04">Title</label>
                        <input type="text" name="title" form="editArticle" placeholder="title" value="{{ old("title",$article->title) }}" class="form-control @error("description0") is-invalid @enderror">
                        @error("title")
                        <small class="text-danger font-weight-bold">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-0">
                        <label for="validationDefault04">Description</label>
                        <textarea name="description" id="" form="editArticle" cols="30" rows="20" class="form-control @error("description0") is-invalid @enderror">{{ old("description",$article->description) }}</textarea>
                        @error("description")
                        <small class="text-danger font-weight-bold">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 mt-3">
            <div class="card">
                <div class="card-body">
                    <button class="btn btn-outline-primary w-100" type="submit" form="editArticle">Update</button>
                </div>
            </div>
        </div>
    </div>
@endsection

