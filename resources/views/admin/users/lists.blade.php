@extends('layouts.app')

@section('content')
    <h1>Danh sách người dùng</h1>
    @can('create', \App\Models\User::class)
    <a href="{{route('admin.users.add')}}" class="btn btn-primary">Thêm</a>
    @endcan
    <hr>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th width="5%">STT</th>
            <th>Tên</th>
            <th>Email</th>
            @can('updateAny', \App\Models\User::class)
            <th width="5%">Sửa</th>
            @endcan
            @can('deleteAny', \App\Models\User::class)
            <th width="5%">Xoá</th>
            @endcan
        </tr>
        </thead>
        <tbody>
        @foreach($users as $key => $user)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                @can('updateAny', \App\Models\User::class)
                <td>
                    <a href="{{route('admin.users.edit', $user)}}" class="btn btn-warning btn-sm">Sửa</a>
                </td>
                @endcan
                @can('deleteAny', \App\Models\User::class)
                <td>
                    <a href="{{route('admin.users.delete', $user)}}" class="btn btn-danger btn-sm">Xoá</a>
                </td>
                @endcan
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
