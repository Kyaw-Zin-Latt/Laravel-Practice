@extends('layouts.app')

@section("title") Edit Category @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category Manager</a></li>
        <li class="breadcrumb-item active" aria-current="page">Category Edit</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4>
                        <i class="fas fa-edit"></i>
                        Category Edit
                    </h4>
                    <hr>
                    <form action="{{ route("category.update",$category->id) }}" method="post" class="mb-3">
                        @method("put")
                        @csrf
                        <div class="form-inline">
                            <input type="text" name="title" placeholder="Add New Category" value="{{ old("title",$category->title) }}"  class="form-control form-control-lg mr-2 @error("message") is-invalid @enderror">
                            <button class="btn btn-primary form-control btn-lg">Update Category</button>
                        </div>
                        @error("title")
                        <small class="text-danger font-weight-bolder">{{ $message }}</small>
                        @enderror
                        @if(session("message"))
                            <small class="text-success font-weight-bold">{!! session("message") !!}</small>
                        @endif
                    </form>
                    @include("category.list")
                </div>
            </div>
        </div>
    </div>
@endsection
