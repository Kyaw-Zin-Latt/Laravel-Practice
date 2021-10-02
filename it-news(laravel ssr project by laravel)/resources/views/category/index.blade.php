@extends('layouts.app')

@section("title") Category @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Category Manager</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4>
                        <i class="fas fa-layer-group"></i>
                        Category List
                    </h4>
                    <hr>
                    <form action="{{ route("category.store") }}" method="post" class="mb-3">
                        @csrf
                        <div class="form-inline">
                            <input type="text" name="title" placeholder="Add New Category" value="{{ old("title") }}"  class="form-control form-control-lg mr-2 @error("message") is-invalid @enderror">
                            <button class="btn btn-primary form-control btn-lg">Add Category</button>
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
