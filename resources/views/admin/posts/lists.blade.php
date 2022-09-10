<h1>Danh sách bài viết</h1>
@foreach($posts as $post)
    @can('view', $post)
    <p>{{$post->title}}</p>
    @endcan
@endforeach
