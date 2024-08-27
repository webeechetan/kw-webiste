@extends('admin.layouts.app') @section('title', 'Blog') @section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" /> @endsection @section('content') <div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Edit Blog</h5>
        <small class="text-muted float-end">
          <a href="{{ route('blog.index') }}">
            <button class="btn btn-primary btn-sm">Blog List</button>
          </a>
        </small>
      </div>
      <div class="card-body">
        <form method="POST" action="{{route('blog.update', $blogs->id)}}" enctype="multipart/form-data"> @csrf @method('PUT') <div class="row">
            <div class="col-md-6 mb-3">
              <div>
                <label class="form-label" for="basic-icon-default-fullname">Publish Date</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text">
                    <i class="bx bxs-watch"></i>
                  </span>
                  <input type="date" class="form-control" id="publish_date" value="{{$blogs->publish_date}}" name="publish_date">
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div>
                <label class="form-label" for="basic-icon-default-company">Title <span class="text-danger">
                    <b>*</b>
                  </span>
                </label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-company2" class="input-group-text">
                    <i class="bx bx-buildings"></i>
                  </span>
                  <input type="text" id="input_title" name="blog_title" value="{{$blogs->title}}" class="form-control" placeholder="Title">
                </div> @error('blog_title') <div class="text-danger mt-2">{{ $message }}</div> @enderror
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div>
                <label class="form-label" for="basic-icon-default-company">Slug</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-company2" class="input-group-text">
                    <i class="bx bx-buildings"></i>
                  </span>
                  <input type="text" id="slug" name="slug" value="{{$blogs->slug}}" class="form-control" placeholder="Slug">
                </div> @error('slug') <div class="text-danger mt-2">{{ $message }}</div> @enderror
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label" for="category_id">Blog Category</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text">
                  <i class="bx bx-category"></i>
                </span>
                <select class="form-select" id="category_id" name="category_id">
                  <option value="">Select Category</option> @foreach($categories as $category) <option value="{{ $category->id }}" {{ $category->id == $blogs->category_id ? 'selected' : '' }}>
                    {{ $category->name }}
                  </option> @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label class="form-label" for="tags">Tags</label>
              <select class="form-select" id="tags" name="tags[]" multiple="multiple"> @foreach($tags as $tag) <option value="{{$tag->id}}" @if(in_array($tag->id , $blogs->tags->pluck('id')->toArray())) selected @endif > {{$tag->name}}</option> @endforeach </select>
            </div>
            <div class="col-md-4 mb-3">
              <div>
                <label class="form-label" for="basic-icon-default-message">Thumbnail</label>
                <div class="input-group">
                  <span class="input-group-btn text-white">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                      <i class="menu-icon tf-icons bx bx-file"></i>Choose </a>
                  </span>
                  <input id="thumbnail" class="form-control" type="text" value="{{$blogs->thumbnail}}" name="thumbnail">
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div>
                <label class="form-label" for="basic-icon-default-message">Banner Image</label>
                <div class="input-group">
                  <span class="input-group-btn text-white">
                    <a id="banners" data-input="banner" data-preview="holder" class="btn btn-primary">
                      <i class="menu-icon tf-icons bx bx-file"></i>Choose </a>
                  </span>
                  <input id="banner" class="form-control" type="text" value="{{$blogs->banner}}" name="banner">
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div>
                <label class="form-label" for="basic-icon-default-message">Short Description</label>
                <textarea name="short_description" value="{{$blogs->short_description}}" rows="1" columns="1" class="form-control">{{$blogs->short_description}}</textarea>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div>
                <label class="form-label" for="basic-icon-default-message">Meta Title</label>
                <input type="text" name="meta_title" value="{{$blogs->meta_title}}" class="form-control" placeholder="Meta Title">
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div>
                <label class="form-label" for="basic-icon-default-message">Meta Description</label>
                <input type="text" name="meta_description" value="{{$blogs->meta_description}}" class="form-control" placeholder="Meta Description">
              </div>
            </div>
            <div class="col-md-12 mb-3">
              <div>
                <label class="form-label" for="basic-icon-default-message">Description</label>
                <textarea id="editor" name="description" class="form-control" placeholder="Description">{{$blogs->description}}</textarea> @error('description') <div class="text-danger mt-2">{{ $message }}</div> @enderror
              </div>
            </div>
            {{-- <div class="col-md-6">
														<div>
															<label class="form-label" for="basic-icon-default-message">OG Title</label>
															<input type="text" name="og_title" class="form-control" value="{{$blogs->og_title}}" placeholder="Og Title">
          </div>
      </div> --}} {{-- <div class="col-md-6">
															<div>
																<label class="form-label" for="basic-icon-default-message">Og Image</label>
																<div class="input-group">
																	<span class="input-group-btn text-white">
																		<a id="og_image" data-input="og_image_input" data-preview="og_image_holder" class="btn btn-primary">
																			<i class="menu-icon tf-icons bx bx-file"></i>Choose
                          
																		</a>
																	</span>
																	<input id="og_image_input" class="form-control" value="{{$blogs->og_image}}" type="text" name="og_image">
    </div>
    <div id="og_image_holder" class="img-fluid" width="250px"></div>
  </div>
</div> --}} </div>
<button type="submit" class="btn btn-primary">Save</button>
</form>
</div>
</div>
</div>
</div> @endsection @section('scripts') <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
  $(document).ready(function() {
    $('#tags').select2({
      placeholder: 'Select Tags',
      tags: true, // Allow adding new tags not in the list
      maximumSelectionLength: 5 // Limit the maximum number of selections to 5
    });
  });
</script>
<script>
  $(document).ready(function() {
    $('#lfm').filemanager('file');
    $('#banners').filemanager('file');
  });
  var options = {
    filebrowserImageBrowseUrl: '/admin/filemanager',
  };
  CKEDITOR.replace('editor', options);
</script> @endsection