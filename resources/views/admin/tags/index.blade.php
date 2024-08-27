@extends('admin.layouts.app')
@section('title', 'Tags')

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Tags List</h5>
        <a href="{{ route('tags.create')}}" class="btn btn-primary btn-sm">Add Tags</a>
    </div>
    <div class="table-responsive text-nowrap">
        <div class="container">
            <table class="table" id="datatable-tag">
                <thead>
                    <tr>
                        <th>Tags Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($tags as $tag)
                    <tr>
                        <td>{{$tag->name}}</td>
                        <td>
                        <a href="{{ route('tags.edit',$tag->id) }}" class="btn btn-primary btn-sm">Edit</a>
                           <form action="{{ route('tags.destroy' , $tag->id) }}" method="POST" class="d-inline" id="deleteForm{{$tag->id}}">
                                @csrf
                                @method('DELETE')
                                {{-- <button type="submit" class="btn btn-danger btn-sm">Delete</button> --}}
                                <button type="button" onclick="confirmDelete({{ $tag->id }})" class="btn btn-danger btn-sm">Delete</button>
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
            $('#datatable-tag').DataTable();
        } );

        function confirmDelete(tagId) {
                    if (confirm('Are you sure you want to delete this tag?')) {
                        document.getElementById('deleteForm'+tagId).submit();
                    }
                }

    </script>
@endsection