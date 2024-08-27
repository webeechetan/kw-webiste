@extends('admin.layouts.app')
@section('title', 'Subscription')

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection



@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">News Letter</h5>
        
    </div>
    <div class="table-responsive text-nowrap">
        <div class="container">
            <table class="table" id="datatable-newsletter">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($newsletters as $newsletter)
                    <tr>
                        <td>{{$newsletter->email}}</td>
                            <td>
                                <form action="{{ route('news.destroy' , $newsletter->id) }}" method="POST" class="d-inline" id="deleteForm{{$newsletter->id}}">
                                     @csrf
                                     @method('DELETE')
                                     <button type="button" onclick="confirmDelete({{ $newsletter->id }})" class="btn btn-danger btn-sm">Delete</button>
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
            $('#datatable-newsletter').DataTable();
        } );

        function confirmDelete(newsletterId) {
                    if (confirm('Are you sure you want to delete this newsletter?')) {
                        document.getElementById('deleteForm'+newsletterId).submit();
                    }
                }
    </script>
@endsection