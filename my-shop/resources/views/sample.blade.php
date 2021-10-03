@extends('layouts.app')

@section("title") Edit Profile @endsection

@section('content')

    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Name & Email</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12 col-md-5">
            <div class="card mb-3">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection
