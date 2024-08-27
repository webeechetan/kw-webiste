@extends('frontend.layouts.app')

@section('title', $blog->meta_title)

@section('meta_description', $blog->meta_description)

@section('content')

 <!--- Left Side --->

<section class="blog-top-header">
    <div class="container">
        {{-- <div class="row">
            <div class="col-12">
                <div class="blog-post-banner">
                    <img src="{{$blog->banner}}" alt="{{ $blog->banner_thumb_alt }}">
                </div>
                </div>
        </div> --}}
        <div class="row">
            <div class="col-12">
                <div class="blog-post-category">
                    <a class="blog-post-cat-a" href="#">
                        <span class="cat-name">{{$blog->category->name}}</span>
                    </a>
                   
                       
                   
                </div>
                <div class="blog-post-title mt-3">
                        <h1>{{$blog->title}}</h1>
                </div>
                <div class="blog-post-meta mt-3">
                        <div class="blog-post-author">
                            <!-- <span class='bx bx-chevrons-right text-secondary'></span> -->
                            <img src="https://kaykewalk.com/storage/files/1/Janet_auth.jpeg" alt="Webeesocial Logo">
                            <span class="meta-value">Janet Augustine</span>
                        </div>
                        <div class="blog-post-date">
                            <span class='bx bx-calendar text-yellow me-1'></span>
                            <span class="meta-value">{{ \Carbon\Carbon::parse($blog->publish_date)->format('M d, Y') }}</span>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</section>
<section class="blog sec-space sec-space-m pb-lg-4">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8 pe-md-4">
                <div class="blog-post-header">
                    <div class="blog-post-thumbnail">
                        <img src="{{$blog->banner}}" alt="{{ $blog->banner_thumb_alt }}">
                    </div>
                </div>
                <div class="blog-post-content">
                        {!! $blog->description !!} 
                </div>
                <div class="blog-post-footer">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-12 mb-3">
                            <div class="blog-post-tag">
                                @foreach ($blog->tags as $tag)
                                <a class="blog-tag-a" href="#">
                                    <span class="tag-shape"><i class='bx bx-purchase-tag' ></i></span>
                                    <span class="tag-name">{{$tag->name}}</span>
                                </a> 
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="blog-post-share">
                                <div class="post-share">
                                    <div class="post-share-heading">Share this post</div>
                                    <div class="post-share-media">
                                        <span class=' share-icon bx bx-share-alt'></span>
                                        <div class="share-list">
                                         
                                            <a target="_blank" href="https://twitter.com/?lang=en?u={{url()->current()}}">
                                                <span class='bx bxl-twitter'></span>
                                            </a>
                                            <a target="_blank" href="https://www.facebook.com/sharer.php?u={{url()->current()}}">
                                                <span class='bx bxl-facebook'></span>
                                            </a>
                                            <a target="_blank" href="https://www.instagram.com/?u={{url()->current()}}">
                                                <span class='bx bxl-instagram'></span>
                                            </a>
                                           
                                            <a target="_blank" href="https://www.linkedin.com/home?u={{url()->current()}}">
                                                <span class='bx bxl-linkedin'></span>
                                            </a>
                                            <a target="_blank" href="https://in.pinterest.com/?u={{url()->current()}}">
                                                <span class='bx bxl-pinterest-alt'></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4">
                <!--- Right Sidebar--->
                <div class="blog-sidebar">
                    <div class="blog-sidebar-search">
                        <div class="blog-sidebar-content">
                            <div id="search" class="blog-search">
                                <div class="blog-search-title widget-title">
                                    <span>Search</span>
                                </div>
                                <form action="{{ route('viewBlog') }}" class="search-form">
                                    <label for="">
                                        <input type="search" name="search" class="search-field" placeholder="Search…" value="">
                                    </label>
                                    <button type="submit" class="search-submit">
                                        <span class="search-btn-icon bx bx-search"></span>
                                        <span class="search-btn-text">Search</span>
                                    </button>
                                </form>
                            </div>
                            <div class="py-2">
                                <hr>
                            </div>
                            <div id="recent-post" class="recent-post">
                                <div class="blog-search-title widget-title">
                                    <span>Recent Posts</span>
                                </div>
                                <div class="recent-post-item">
                                    <div class="recent-post-thumbnail">
                                        {{-- <a href="{{ route('viewBlogInner', ['id' => $recentBlog->id]) }}"><img src="{{$recentBlog->thumbnail}}" alt="thumbnail"></a> --}}

                                        <a href="{{ route('viewBlogInner',$blog->slug) }}"><img src="{{$recentBlog->thumbnail}}" alt="thumbnail"></a>
                                    </div>
                                    <div class="recent-post-content">
                                        <div class="recent-post-meta">
                                            <div class="recent-post-category">
                                                {{-- <a href="{{ route('viewBlogInner', ['id' => $recentBlog->id]) }}">{{$recentBlog->category->name}}</a> --}}
                                                <a href="">{{$recentBlog->category->name}}</a>
                                            </div>
                                            <div class="recent-post-date">{{ \Carbon\Carbon::parse($blog->publish_date)->format('M d, Y') }}</div>
                                        </div>
                                        <div class="recent-post-title">
                                            <h6><a class="text-white" href="{{ route('viewBlogInner',$blog->slug) }}">{{$recentBlog->title}}</a></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="py-2">
                                <hr>
                            </div>
                            <div id="category" class="blog-category">
                                <div class="blog-search-title widget-title">
                                    <span>Category</span>
                                </div>
                                <ul class='mb-0'>
                                    @foreach($categoryies as $category)
                                    <li class="cat-item">
                                        <a href="{{ route('viewBlog')}}?search={{$category->name}}">
                                            {{$category->name}}
                                            <span class="count">({{$category->blog->count()}})</span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="py-2">
                                <hr>
                            </div>
                            <div id="popular-tag" class="blog-tag">
                                <div class="blog-search-title widget-title">
                                    <span>Tags</span>
                                </div>
                                @foreach ($tags as $tag)
                                <div class="multi-tag">
                                    <a href="{{ route('viewBlog') }}?search={{$tag->name}}" class="tag-link">{{$tag->name}}</a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="monthly-newsletter early-access-newsletter">
                        <h6 class="title pb-2">Collaborate, Innovate, Integrate</h6>
                        <p class="description">Explore the latest trends and strategies in team management, client services, and creative collaboration with our monthly newsletter.</p>
                        <form class="news-letter-sidebar mt-1" method="post" action="{{route('news.store')}}">
                            @csrf
                            <input class="form-control" placeholder="Enter your email" type="email" name="newsletter_email" id="" required="">
                            <button type="submit" class="btn btn-primary btn-subscribe">Subscribe Now</button>
                        </form>
                    </div>
                </div>
                <div class="monthly-newsletter demo-account">
                    <h6 class="title pb-2">Get an Early Access Demo</h6>
                    <p class="description">Sign Up and get early access our platform’s Demo.</p>
                      <a href="#" class="btn btn-primary btn-subscribe">Demo</a>
                </div>
            </div>
                

            </div>
        </div>
    </div>
</section>
<section class="sec-space sec-space-m pt-0">
    <div class="container">
        <div class="row">
            <div class="related-post">
                <h3 class="related-post-title">You May Also Like</h3>
                <div class="post-slider blog-wrap">
                    <div class="row">

                        @if ($related_blogs->count() > 0)
                            @foreach($related_blogs as $blog)
                            <div class="col-lg-4 mb-3 mb-lg-0">
                                <div class="post-slider-item h-100">
                                    <div class="blog-post-item">
                                        <a href="{{ route('viewBlogInner', $blog->slug) }}">
                                            <div class="blog-post-thumbnail">
                                                <img src="{{ $blog->thumbnail }}"
                                                    alt="{{ $blog->banner_thumb_alt ?? 'Thumbnail Image' }}">

                                            </div>
                                            <div class="card-body p-0">
                                                <div class="post-info">
                                                    <h4 class="post-title">
                                                        <a href="{{ route('viewBlogInner',$blog->slug) }}" class='anchor-style'>{{ $blog->title  }}</a>
                                                    </h4>
                                                    <div class="post-meta">
                                                        <div class="post-date">
                                                            <span>
                                                            {{ \Carbon\Carbon::parse($blog->publish_date)->format('M d, Y') }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="arrow-hover">
                                                     <div class="post-link anchor-style">Read More</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            @else
                            <div class="col-md-12">
                                <p>No related blogs available</p>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!--- Contact Modal Popup --->
            <div class="modal fade"  id="subscribeModal" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="text-end">
                       
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-4 pt-0 pb-4">
                            <div class="form-header">
                                <img src="{{asset('frontend')}}/images/form-icon.png" alt="img-fluid form-icon">
                                <h5 class="text-dark mb-2">Welcome  to Kaykewalk</h5>
                            </div>
                            <form method="POST" action="{{route('viewContactUs')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                           <label for="" class="pb-2"><strong>Full Name</strong></label>
                                            <input type="text" class="form-control" id="name" placeholder="Enter Your Full Name" required>
                                           
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label for="" class="pb-2"><strong>Email</strong></label>
                                            <input type="email" class="form-control" id="email" placeholder="Work Email" required>
                                         
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="pb-2"><strong>Company Name</strong></label>
                                            <input type="text" class="form-control" id="number" placeholder="Enter Your Company Name" required>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label for="" class="pb-2"><strong>Phone No</strong></label>
                                            <input type="number" class="form-control" id="number" placeholder="Enter Your Number" required>
                                           
                                        </div>
                                    </div>
                                     <div class="col-md-12 mb-4">
                                       <div class="form-group">
                                            <label for="" class="pb-2"><strong>Message</strong></label>
                                            <textarea name="" id="" cols="4" rows="3" class="form-control" placeholder="Enter Your Message Here"></textarea> 
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="col-md-6 mx-auto">
                                        <Button class="btn btn-primary btn-subscribe" >Subscribe</Button>
                                    </div>
                                </div>
                            </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
