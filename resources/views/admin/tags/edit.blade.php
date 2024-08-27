@extends('admin.layouts.app')
@section('title', 'Tags')
@section('content')
<div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Edit Tags</h5>
        </div>  
        <div class="card-body">
          <form method="POST" action="{{ route('tags.update',$tags->id) }}"  >
            @csrf
            @method('PUT')
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fullname">Tag Name</label>
                    <div class="input-group input-group-merge">
                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                    <input type="" class="form-control" id="basic-icon-default-fullname" name="tag_name" value="{{$tags->name}}">
                    </div>
                    @error('tag_name')    
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
