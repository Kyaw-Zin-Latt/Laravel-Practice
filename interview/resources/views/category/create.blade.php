@extends('layouts.app')

@section("title") Edit Profile @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create Category</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12 col-md-6">
           <div class="card">
               <div class="card-header">
                   <h4 class="mb-0 font-weight-bolder">Category Information</h4>
               </div>
               <div class="card-body">
                   <form action="{{ route("category.store") }}" method="post" enctype="multipart/form-data">
                       @csrf
                       <div class="form-group">
                           <label for="title">
                               <i class="fas fa-layer-group text-primary"></i>
                               Category Name <span class="text-danger font-weight-bolder h4">*</span>
                           </label>
                           <input type="text" name="title" value="{{ old("title") }}" class="form-control @error("title") is-invalid @enderror" id="title" placeholder="Category Name">
                           @error("title")
                                <small class="text-danger font-weight-bolder">{{ $message }}</small>
                           @enderror
                       </div>
                       <div class="form-group">
                           <label for="photo">
                               <i class="fas fa-image text-primary"></i>
                               Category Photo <span class="text-danger font-weight-bolder h4">*</span>
                           </label>
                           <input type="file" name="photo" class="form-control p-1 @error("title") is-invalid @enderror" id="photo">
                           @error("photo")
                           <small class="text-danger font-weight-bolder">{{ $message }}</small>
                           @enderror
                       </div>
                       <div class="form-group">
                           <label for="icon">
                               <i class="fas fa-icons text-primary"></i>
                               Category Icon <span class="text-danger font-weight-bolder h4">*</span>
                           </label>
                           <input type="file" name="icon" class="form-control p-1 @error("title") is-invalid @enderror" id="icon">
                           @error("icon")
                           <small class="text-danger font-weight-bolder">{{ $message }}</small>
                           @enderror
                       </div>
                       <div class="form-group">
                           <div class="form-check">
                               <input class="form-check-input" name="publish" type="checkbox" id="gridCheck">
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
