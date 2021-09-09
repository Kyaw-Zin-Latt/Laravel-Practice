@extends("layouts.app")

@section('head')

    <style>
        .article-thumbnail {
            width: 60px;
            height: 60px;
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
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Article List</li>
                @endcomponent

                <div class="card">
                    <div class="card-header">
                        Article List
                    </div>

                    <div class="card-body">
                        @if (session('deleteStatus'))
                            <p class="alert alert-danger">{{ session('deleteStatus') }}</p>
                        @endif
                        @if (session('addStatus'))
                            <p class="alert alert-success">{{ session('addStatus') }}</p>
                        @endif

                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="___class_+?11___">
                                {{ $articles->appends(Request::all())->links() }}
                            </div>
                            <div class="___class_+?12___">
                                <form class="form-inline" action="{{ route('article.search') }}">
                                    <input name="key" type="text" class="form-control">
                                    <button type="submit" class="ml-2 btn btn-primary">Search</button>
                                </form>
                            </div>
                        </div>
                        <table class="table table-hover table-bordered align-middle table-secondary">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>User_id</th>
                                    <th>Control</th>
                                    <th>Date / Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @inject("user","App\User")
                                @inject("photo","App\Photo")
                                @foreach ($articles as $article)
                                    <tr>
                                        <td>{{ $article->id }}</td>
                                        <td>{{ substr($article->title, 0, 30) }}.....</td>
                                        <td>
                                            {{ substr($article->description, 0, 50) }}.....
                                            <br>
                                            @foreach ($article->getPhotos as $p)
                                                <div class="article-thumbnail"
                                                    style="background-image: url('{{ asset('storage/article/' . $p->location) }}')">
                                                </div>
                                            @endforeach
                                        </td>
                                        <td class="text-nowrap">
                                            @isset($article->getUser)
                                                {{ $article->getUser->name }}
                                            @else
                                                Known
                                            @endisset
                                        </td>
                                        <td class="text-nowrap">
                                            <button form="del{{ $article->id }}" type="submit"
                                                class="btn btn-outline-danger">Delete</button>
                                            <form class="d-inline-block"
                                                action="{{ route('article.destroy', $article->id) }}"
                                                id="del{{ $article->id }}" method="post">
                                                @csrf
                                                @method("delete")
                                            </form>
                                            <a class="btn btn-outline-info"
                                                href="{{ route('article.edit', $article->id) }}">Edit</a>
                                        </td>
                                        <td class="text-nowrap">
                                            <small>
                                                {{ $article->created_at->format('d M Y') }}
                                                <br>
                                                {{ $article->created_at->format('h : i a') }}
                                            </small>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
