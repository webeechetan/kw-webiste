@extends('admin.layouts.app')
@section('title', 'Meta')
@section('content')
<div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Edit Meta</h5>
        </div>  
        <div class="card-body">
          <form method="POST" action="{{ route('meta.update',$meta->id) }}" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="row">

                  <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Title <span class="text-danger"><b>*</b></span> </label>
                        <div class="input-group input-group-merge">
                          <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                          <input type="text" id="input_title" name="title" value="{{$meta->title}}" class="form-control">
                        </div>
                          @error('title')    
                              <div class="text-danger mt-2">{{ $message }}</div>
                          @enderror
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Meta Title <span class="text-danger"><b>*</b></span> </label>
                        <div class="input-group input-group-merge">
                          <span id="basic-icon-default-company2" class="input-group-text"><i class="bx bx-buildings"></i></span>
                          <input type="text" id="meta_title" name="meta_title" value="{{$meta->meta_title}}" class="form-control">
                        </div>
                          @error('meta_title')    
                              <div class="text-danger mt-2">{{ $message }}</div>
                          @enderror
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">URL</label>
                      <input type="text" id="" name="url" value="{{$meta->url}}" class="form-control">
                    </div>
                    @error('url')    
                              <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-md-12">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Meta Description</label>
                      <textarea id="meta_description" name="meta_description" class="form-control">{{$meta->meta_description}}</textarea>
                    </div>
                    @error('meta_description')    
                              <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">OG Title</label>
                      <input type="text" name="og_title" class="form-control" value="{{$meta->og_title}}" >
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="basic-icon-default-message">Og Image</label>
                      <div class="input-group">
                        <span class="input-group-btn text-white">
                          <a id="og_image" data-input="og_image_input" data-preview="og_image_holder" class="btn btn-primary">
                            <i class="menu-icon tf-icons bx bx-file"></i>Choose
                          </a>
                        </span>
                        <input id="og_image_input" class="form-control" type="text" value="{{$meta->og_image}}" name="og_image">
                      </div>
                      <div id="og_image_holder" class="img-fluid" width="250px"></div>
                    </div>
                  </div>

              </div>
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection


@section('scripts')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>

$(document).ready(function (){

  $('#og_image').filemanager('file');

});

  var options = {
    filebrowserImageBrowseUrl: '/admin/filemanager',
  };

  CKEDITOR.replace('meta_description', options);
</script>
@endsection