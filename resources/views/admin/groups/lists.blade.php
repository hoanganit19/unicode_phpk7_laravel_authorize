@extends('layouts.app')

@section('content')
    <h1>Danh sách nhóm</h1>
    <a href="{{route('admin.groups.add')}}" class="btn btn-primary">Thêm</a>
    <hr>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th width="5%">STT</th>
            <th>Tên</th>
            <th width="15%">Phân quyền</th>
            <th width="5%">Sửa</th>
            <th width="5%">Xoá</th>
        </tr>
        </thead>
        <tbody>
        @foreach($groups as $key => $group)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$group->name}}</td>
                <td>
                    <a href="{{route('admin.groups.permission', $group)}}" class="btn btn-primary btn-sm">Phân quyền</a>
                </td>
                <td>
                    <a href="{{route('admin.groups.edit', $group)}}" class="btn btn-warning btn-sm">Sửa</a>
                </td>
                <td>
                    <a href="{{route('admin.groups.delete', $group)}}" class="btn btn-danger btn-sm">Xoá</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
