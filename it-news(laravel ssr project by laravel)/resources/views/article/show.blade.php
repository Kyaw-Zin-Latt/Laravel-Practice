@extends('layouts.app')

@section("title") {{ $article->title }} @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Article</a></li>
        <li class="breadcrumb-item active" aria-current="page">Article Detail</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-0 font-weight-bolder">
                        {{ $article->title }}
                    </h5>
                    <div class="mt-2 mb-4">
                        <span class="small font-weight-bolder text-nowrap text-info">
                        <i class="fas fa-user"></i>
                        {{ $article->user->name }}
                        <i class="fas fa-layer-group"></i>
                        {{ $article->category->title }}
                        <i class="fas fa-calendar-alt"></i>
                        {{ $article->created_at->format("d M, Y") }}
                        <i class="fas fa-clock"></i>
                        {{ $article->created_at->format("h:i A") }}
                    </span>
                    </div>
                    <p class="mb-0 text-black-50">
                        {{ $article->description }}
                    </p>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <form class="d-inline-block" action="{{ route("article.destroy",$article->id) }}" method="post">
                                @csrf
                                @method("delete")
                                <button class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete?')">Delete</button>
                            </form>
                            <a href="{{ route("article.edit",$article->id) }}" class="btn btn-outline-primary">Edit</a>
                        </div>
                        <p class="font-weight-bolder text-primary mb-0">{{ $article->created_at->diffForHumans() }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
