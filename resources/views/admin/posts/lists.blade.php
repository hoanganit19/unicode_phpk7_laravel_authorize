@extends('layouts.app')

@section('content')
    <h1>Danh sách bài viết</h1>
    @can('create', \App\Models\Post::class)
        <a href="{{route('admin.posts.add')}}" class="btn btn-primary">Thêm</a>
    @endcan
    <hr>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th width="5%">STT</th>
            <th>Tiêu đề</th>
            <th width="15%">Người đăng</th>
            @can('updateAny', \App\Models\Post::class)
                <th width="5%">Sửa</th>
            @endcan

            @can('deleteAny', \App\Models\Post::class)
                <th width="5%">Xoá</th>
            @endcan
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $key => $post)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$post->title}}</td>
                <td>
                    {{$post->user->name}}
                </td>
                @can('update', $post)
                    <td>

                        <a href="{{route('admin.posts.edit', $post)}}" class="btn btn-warning btn-sm">Sửa</a>

                    </td>
                @endcan

                @can('delete', $post)
                    <td>

                        <a href="{{route('admin.posts.delete', $post)}}" class="btn btn-danger btn-sm">Xoá</a>

                    </td>
                @endcan
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
