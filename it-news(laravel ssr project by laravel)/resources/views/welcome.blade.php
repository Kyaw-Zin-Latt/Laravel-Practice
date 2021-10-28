@extends("blog.master")

@section("content")
    @forelse($articles as $article)

        <div class="">
            <div class="border-bottom mb-4 pb-4 article-preview">
                <div class="p-0 p-md-3">
                    <a class="fw-bold h4 d-block text-decoration-none" href="http://localhost:9090/2021/09/15/et-omnis-eum-ab-non/">
                        {{ $article->title }}
                    </a>

                    <div class="small post-category">
                        <a href="{{ route("baseOnCategory",$article->category->slug) }}" rel="category tag">{{ $article->category->title }}</a>
                    </div>


                    <div class="text-black-50 the-excerpt">
                        <p>
                            {{ $article->excerpt }}
                        </p>
                    </div>

                    <div class="d-flex justify-content-between align-items-center see-more-group">
                        <div class="d-flex align-items-center">
                            @if($article->user->photo)
                                <img alt="" src="{{ asset("storage/profile/".$article->user->photo) }}" class="avatar avatar-50 photo rounded-circle" height="50" width="50" loading="lazy">
                            @else
                                <img alt="" src="{{ asset("dashboard/img/user-default-photo.jpg") }}" class="avatar avatar-50 photo rounded-circle" height="50" width="50" loading="lazy">
                            @endif
                            <div class="ms-2">
                                    <a href="{{ route("baseOnUser",$article->user->id) }}" class="small text-decoration-none">
                                        <i class="feather-user"></i>
                                        {{ $article->user->name }}
                                    </a>
                                <br>
                                <a class="small text-decoration-none" href="{{ route("baseOnDate",$article->created_at->format("Y-m-d")) }}">{{ $article->created_at->format("d F Y") }}</a>
                            </div>
                        </div>

                        <a href="{{ route("detail",$article->slug) }}" class="btn btn-outline-primary rounded-pill px-3">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-block d-lg-none d-flex justify-content-center" id="pagination">
            <div class="pagination">
                <ul class="pagination">
                    <li class="page-item active"><span aria-current="page" class="page-link">1</span></li>
                    <li class="page-item"><a class="page-link" href="http://localhost:9090/page/2/">2</a></li>
                    <li class="page-item"><span class="page-link dots">…</span></li>
                    <li class="page-item"><a class="page-link" href="http://localhost:9090/page/6/">6</a></li>
                    <li class="page-item"><a class="page-link" href="http://localhost:9090/page/7/">7</a></li>
                    <li class="page-item"><a class="next page-link" href="http://localhost:9090/page/2/"><i
                                class="feather-arrow-right"></i></a></li>
                </ul>
            </div>
        </div>

    @empty
       <p class="alert alert-warning font-weight-bolder text-center">There is no Articles.</p>
       <a href="{{ route("/") }}" class="btn btn-outline-primary">
           <i class="fas fa-home"></i>
           Go To Home Page
       </a>
    @endforelse
@endsection

@section("pagination-place")
    <div class="pagination" id="pagination">
        {{ $articles->onEachSide(1)->links() }}
    </div>
@endsection
