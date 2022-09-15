@extends('layouts.app')

@section('content')
    <h1>Danh sách nhóm</h1>
    @can('create', \App\Models\Group::class)
    <a href="{{route('admin.groups.add')}}" class="btn btn-primary">Thêm</a>
    @endcan
    <hr>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th width="5%">STT</th>
            <th>Tên</th>
            @can('permissionAny', \App\Models\Group::class)
            <th width="15%">Phân quyền</th>
            @endcan
            @can('updateAny', \App\Models\Group::class)
            <th width="5%">Sửa</th>
            @endcan
            @can('deleteAny', \App\Models\Group::class)
            <th width="5%">Xoá</th>
            @endcan
        </tr>
        </thead>
        <tbody>
        @foreach($groups as $key => $group)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$group->name}}</td>
                @can('permissionAny', \App\Models\Group::class)
                <td>
                    <a href="{{route('admin.groups.permission', $group)}}" class="btn btn-primary btn-sm">Phân quyền</a>
                </td>
                @endcan
                @can('updateAny', \App\Models\Group::class)
                <td>
                    <a href="{{route('admin.groups.edit', $group)}}" class="btn btn-warning btn-sm">Sửa</a>
                </td>
                @endcan
                @can('deleteAny', \App\Models\Group::class)
                <td>
                    <a href="{{route('admin.groups.delete', $group)}}" class="btn btn-danger btn-sm">Xoá</a>
                </td>
                @endcan
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
