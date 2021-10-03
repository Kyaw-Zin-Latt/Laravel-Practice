@extends('layouts.app')

@section("title") Edit Profile @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Profile</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12 col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ isset(Auth::user()->photo) ? asset('storage/profile/'.Auth::user()->photo) : asset('dashboard/img/user-default-photo.jpg') }}" class="w-50 rounded-circle my-3" alt="">
                        <h3 class="font-weight-bold">
                            {{ Auth::user()->name }}
                        </h3>
                        <p class="">
                            {{ Auth::user()->email }}
                        </p>
                        <p class="">
                            {{ Auth::user()->phone }}
                        </p>
                        <p class="">
                            {{ Auth::user()->address }}
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
