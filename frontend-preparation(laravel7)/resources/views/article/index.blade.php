@extends('layouts.app')

@section("title") Article @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Article</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4>
                        <i class="fas fa-list"></i>
                        Article List
                    </h4>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <a href="{{ route("article.create") }}" class="btn btn-outline-primary btn-lg mr-2">
                                <i class="feather-plus-circle"></i>
                            </a>
                            @isset(request()->search)
                                <a href="{{ route("article.index") }}" class="btn btn-outline-dark btn-lg mr-2">
                                    <i class="feather-list"></i>
                                </a>
                                <span class="h5">Search By : "{{ request()->search }}"</span>
                            @endisset
                        </div>
                        <form action="{{ route("article.index") }}" method="get" class="mb-3">
                            <div class="form-inline">
                                <input type="text" name="search" placeholder="Search Article" value="{{ old("search") }}"  class="form-control form-control-lg mr-2" required>
                                <button class="btn btn-primary form-control btn-lg">
                                    <i class="feather-search"></i>
                                </button>
                            </div>

                        </form>
                    </div>
                    @if(session("message"))
                        <small class="text-success font-weight-bold">{!! session("message") !!}</small>
                    @endif
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Article</th>
                            <th>Category</th>
                            <th>Owner</th>
                            <th>Control</th>
                            <th>Created_at</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                <td>
                                    <span class="font-weight-bolder">{{ Str::words($article->title,5) }}</span>
                                    <br>
                                    <span class="text-black-50">{{ Str::words($article->description,6) }}</span>
                                </td>
                                <td>{{ $article->category->title }}</td>
                                <td class="text-nowrap">{{ $article->user->name }}</td>
                                <td class="text-nowrap">
                                    <a href="{{ route("article.show",$article->id) }}" class="btn btn-outline-success">Show</a>
                                    <a href="{{ route("article.edit",$article->id) }}" class="btn btn-outline-info">Edit</a>
                                    <form class="d-inline-block" action="{{ route("article.destroy",$article->id) }}" method="post">
                                        @csrf
                                        @method("delete")
                                        <button class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete this article?')">Delete</button>
                                    </form>
                                </td>
                                <td>
                                <span class="small text-nowrap">
                                    <i class="fas fa-calendar-alt"></i>
                                    {{ $article->created_at->format("d M, Y") }}
                                    <br>
                                    <i class="fas fa-clock"></i>
                                    {{ $article->created_at->format("h:i A") }}
                                </span>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="6" class="text-center">There is no artcile.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        {{ $articles->appends(request()->all())->links() }}
                        <p class="h4 mb-0">
                           Total : {{ $articles->total() }}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
