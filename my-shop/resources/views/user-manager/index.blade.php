@extends('layouts.app')

@section("title") User Manager @endsection

@section('content')

    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">User Manager</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="">
                        <h4>
                            <i class="fas  fa-users"></i>
                            User List
                        </h4>
                    </div>
                    <hr>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Control</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td class="text-nowrap">

                                    @if($user->role == 1)

                                        @if($user->role != 0)
                                            <form class="d-inline-block" action="{{ route("user-manager.change.admin") }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                <button class="btn btn-outline-info btn-sm">To Admin</button>
                                            </form>
                                        @endif
                                        <button class="btn btn-outline-primary btn-sm" onclick="changePassword({{ $user->id }},'{{ $user->name }}')">Change Password</button>
                                        @if($user->isBaned == 0)
                                            <form class="d-inline-block" action="{{ route("user-manager.toBan") }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                <button class="btn btn-outline-danger btn-sm">Ban</button>
                                            </form>
                                        @else

                                            <form class="d-inline-block" action="{{ route("user-manager.toUnBan") }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                <button class="btn btn-outline-secondary">UnBan</button>
                                            </form>
                                        @endif

                                    @endif

                                </td>
                                <td class="text-nowrap">
                                    <small>
                                        <i class="fas fa-calendar-alt"></i>
                                        {{ $user->created_at->format("d M Y") }}
                                    </small>
                                    <br>
                                    <small>
                                        <i class="fas fa-clock"></i>
                                        {{ $user->created_at->format("h:i a") }}
                                    </small>
                                </td>
                                <td>

                                    <small>
                                        <i class="fas fa-calendar-alt"></i>
                                        {{ $user->updated_at->format("d M Y") }}
                                    </small>
                                    <br>
                                    <small>
                                        <i class="fas fa-clock"></i>
                                        {{ $user->updated_at->format("h:i a") }}
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
@endsection

@section("foot")

    <script>
        function changePassword(id,name) {
            Swal.fire({
                title: 'Change Password for ' + name,
                input: 'password',
                inputAttributes: {
                    autocapitalize: 'off',
                    required : "required",
                    minLength : 8
                },
                showCancelButton: true,
                confirmButtonText: 'Change Password',
                showLoaderOnConfirm: true,
                preConfirm:function (newPassword) {
                    // console.log(id,newPassword);
                    let url = '{{ route("user-manager.changePassword") }}';
                    $.post(url,{
                        id : id,
                        password : newPassword,
                        _token : "{{ csrf_token() }}"
                    }).done(function (data) {
                        if (data.status == 200) {
                            Swal.fire({
                                icon : "success",
                                title : data.message,
                            })
                        }else {
                            Swal.fire({
                                icon : "error",
                                title : data.message.password[0],
                            })
                        }
                    })
                }
            })
        }
    </script>

@stop
