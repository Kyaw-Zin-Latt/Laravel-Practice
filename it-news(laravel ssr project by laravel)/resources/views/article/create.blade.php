@extends('layouts.app')

@section("title") Article Create @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Article</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create Article</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body mb-0">
                    <h4 class="mb-0">
                        <i class="fas fa-plus-circle"></i>
                        Create Article
                    </h4>
                    <form action="{{ route("article.store") }}" id="createArticle" method="post" class="">
                        @csrf

                    </form>
                </div>
            </div>
        </div>
        <div class="col-3 mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <label for="validationDefault04">Select Category</label>
                        <select form="createArticle" name="category" class="custom-select @error("description0") is-invalid @enderror" id="validationDefault04">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == old("category") ? "selected" : "" }}>{{ $category->title }}</option>
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
                        <input type="text" name="title" form="createArticle" placeholder="title" value="{{ old("title") }}" class="form-control @error("description0") is-invalid @enderror">
                        @error("title")
                        <small class="text-danger font-weight-bold">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-0">
                        <label for="validationDefault04">Description</label>
                        <textarea name="description" id="" form="createArticle" cols="30" rows="20" class="form-control @error("description0") is-invalid @enderror">{{ old("description") }}</textarea>
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
                    <button class="btn btn-outline-primary w-100" type="submit" form="createArticle">Create Article</button>
                </div>
            </div>
        </div>
    </div>
@endsection

