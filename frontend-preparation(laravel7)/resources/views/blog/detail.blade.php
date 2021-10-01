@extends("blog.master")
@section("title") Detail @endsection

@section("content")

    <div class="">
        <div class="py-3">

            <div class="small post-category mb-3">
                <a href="{{ route("baseOnCategory",$article->category->id) }}" rel="category tag">{{ $article->category->title }}</a>
            </div>

            <h2 class="fw-bolder">{{ $article->title }}</h2>
            <div class="my-3 feature-image-box">
                <div class="d-block d-md-flex justify-content-between align-items-center my-3">

                    <div class="">
                        @if($article->user->photo)
                            <img alt="" src="{{ asset("storage/profile/".$article->user->photo) }}" class="avatar avatar-50 photo rounded-circle" height="50" width="50" loading="lazy">
                        @else
                            <img alt="" src="{{ asset("dashboard/img/user-default-photo.jpg") }}" class="avatar avatar-50 photo rounded-circle" height="50" width="50" loading="lazy">
                        @endif
                        <a href="{{ route("baseOnUser",$article->user->id) }}" title="Visit admin’s website" rel="author external">{{ $article->user->name }}</a>
                    </div>

                    <div class="text-primary">
                        <i class="feather-calendar"></i>
                        <a href="{{ route("baseOnDate",$article->created_at->format("Y-m-d")) }}">{{ $article->created_at->format("d F Y") }}</a>
                        {{ $article->created_at->format("h:i a") }}
                    </div>
                </div>

                <p>
                    {{ $article->description }}
                </p>

                @php
                    $prevArticle = \App\Article::where("id","<",$article->id)->latest("id")->first();
                    $nextArticle = \App\Article::where("id",">",$article->id)->first();
                @endphp
{{--                {{ $prevArticle }}--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                {{ $nextArticle }}--}}

                <div class="nav d-flex justify-content-between p-3">
                    @if($prevArticle)
                        <a href="{{ route("detail",$prevArticle->id) }}"
                           class="btn btn-outline-primary page-mover rounded-circle">
                            <i class="feather-chevron-left"></i>
                        </a>
                    @endif


                    <a class="btn btn-outline-primary px-3 rounded-pill" href="{{ route("/") }}">
                        Read All
                    </a>

                    @if($nextArticle)
                        <a href="{{ route("detail",$nextArticle->id) }}"
                           class="btn btn-outline-primary page-mover rounded-circle">
                            <i class="feather-chevron-right"></i>
                        </a>
                    @endif
                </div>
            </div>


        </div>

        <div class="d-block d-lg-none d-flex justify-content-center">
        </div>

    </div>


@stop
