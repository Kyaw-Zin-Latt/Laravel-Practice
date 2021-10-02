@extends('layouts.app')

@section("title") Edit Category @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0 font-weight-bolder">Category Edit</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route("category.update",$category->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("put")
                        <div class="form-group">
                            <label for="title">
                                <i class="fas fa-layer-group text-primary"></i>
                                Category Name
                            </label>
                            <input type="text" name="title" value="{{ old("title",$category->title) }}" class="form-control @error("title") is-invalid @enderror" id="title" placeholder="Category Name">
                            @error("title")
                            <small class="text-danger font-weight-bolder">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="photo">
                                <i class="fas fa-image text-primary"></i>
                                Category Photo
                            </label>
                            <input type="file" name="photo" value="{{ old("$category->category_photo") }}" class="form-control p-1 @error("title") is-invalid @enderror" id="photo">
                            @error("photo")
                            <small class="text-danger font-weight-bolder">{{ $message }}</small>
                            @enderror
                            <img src="{{ asset("storage/category/photo/".$category->category_photo) }}" class="rounded mt-2" style="width: 100px"; alt="">

                        </div>
                        <div class="form-group">
                            <label for="icon">
                                <i class="fas fa-icons text-primary"></i>
                                Category Icon
                            </label>
                            <input type="file" name="icon" class="form-control p-1 @error("title") is-invalid @enderror" id="icon">
                            @error("icon")
                            <small class="text-danger font-weight-bolder">{{ $message }}</small>
                            @enderror
                            <img src="{{ asset("storage/category/icon/".$category->category_icon) }}" class="rounded mt-2" style="width: 100px"; alt="">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" name="publish" {{ $category->publish == "0" ? "" : "checked" }} type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Status(Is Publish?)
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary w-100">Create New Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
