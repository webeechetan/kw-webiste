@extends('admin.layouts.app')
@section('title', 'Blog')

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">


@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Blog List</h5>
        <a href="{{route('blog.create')}}" class="btn btn-primary btn-sm">Add Blog</a>
    </div>
    <div class="table-responsive text-nowrap">
        <div class="container">
            <table class="table table-hover" id="datatable-blog">
                <thead>
                    <tr>
                        <th>Publish Date</th>
                        <th>Title</th>
                        
                        <th>Category</th>
                        <th>Tags</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($blogs as $blog)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($blog->publish_date)->format('d M y') }}</td>
                        <td>{{$blog->title}}</td>
                        <td>{{$blog->category->name}}</td>
                        {{-- <td>{{$blog->tags}}</td> --}}
                        <td>
                            @foreach($blog->tags as $tag)
                                {{ $tag->name }}@if(!$loop->last), @endif
                            @endforeach
                        </td>
                        <td>
                        <a href="{{route('blog.edit', $blog->id)}}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{route('blog.destroy',$blog->id)}}" method="POST" class="d-inline" id="deleteForm{{$blog->id}}">
                                @csrf
                                @method('DELETE')
                                {{-- <button type="submit" class="btn btn-danger btn-sm">Delete</button> --}}
                                <button type="button" onclick="confirmDelete({{ $blog->id }})" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    


    <script>
        $(document).ready( function () {
            $('#datatable-blog').DataTable();
        } );

        function confirmDelete(blogId) {
                    if (confirm('Are you sure you want to delete this blog?')) {
                        document.getElementById('deleteForm'+blogId).submit();
                    }
                }


    </script>
@endsection