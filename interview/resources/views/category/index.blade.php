@extends('layouts.app')

@section("title") Category @endsection

@section("content")

    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Category</li>
    </x-bread-crumb>
    <div class="">
        @if(session("message"))
            <p class="alert alert-success">{!! session('message') !!}</p>
        @endif
    </div>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>No</th>
            <th>Category Name</th>
            <th>Photo</th>
            <th>Icon</th>
            <th>Control</th>
            <th>Publish</th>
            <th>Date / Time</th>
        </tr>
        </thead>
        <tbody>
        @forelse($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ Str::title(Str::substr($category->title, 0, 25)) }} {{ Str::length($category->title) > 26 ? "..." : "" }}</td>
            <td>
                <img src="{{ asset("storage/category/photo/".$category->category_photo) }}" class="rounded" style="width: 50px"; alt="">
            </td>
            <td>
                <img src="{{ asset("storage/category/icon/".$category->category_icon) }}" class="rounded" style="width: 50px"; alt="">
            </td>
            <td>
                <form action="{{ route("category.destroy",$category->id) }}" class="d-inline-block" method="post">
                    @csrf
                    @method("delete")
                    <button class="btn btn-outline-danger"><i class="fas fa-trash-alt fa-fw"></i></button>
                </form>
                <a href="{{ route("category.edit",$category->id) }}" class="btn btn-outline-info"><i class="fas fa-edit fa-fw"></i></a>
            </td>
            <td>
                @if($category->publish == "0")
                    <button class="btn btn-danger">No</button>
                @else
                    <button class="btn btn-success">Yes</button>
                @endif
            </td>
            <td>
                <small>
                    <i class="fas fa-calendar-alt"></i>
                    {{ $category->created_at->format('d M Y') }}
                    <br>
                    <i class="fas fa-clock"></i>
                    {{ $category->created_at->format('h : i a') }}
                </small>
            </td>
        </tr>

        @empty
            <tr>
                <td colspan="7">
                    <p class="text-center mb-0 font-weight-bolder">There is no Category😢😢😢.</p>
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-between align-items-center">
        {{ $categories->links() }}
        <h4 class="font-weight-bolder">Total : {{ $categories->total() }}</h4>
    </div>
@endsection
