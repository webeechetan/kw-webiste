@extends('frontend.layouts.app')
@section('title', 'Blogs')

@section('content')

<!--- Blog Banner --->
<section class="blog-banner page-banner">
    <img src="{{asset('frontend')}}/images/Blog-Banner.jpg">
</section>
<!--- Blog Content --->
<section class="blog sec-space sec-space-m">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-title">
                    <h1>Blogs</h1>
                </div>
            </div>
        </div>
        <div class="blog-wrap grid-style">
            <div class="row">
                @forelse ($blogs as $blog)
                <div class=" col-12 col-md-6 col-xl-4 mb-4">
                    <div class="blog-post-item">
                        <a href="{{ route('viewBlogInner', $blog->slug) }}">
                            <div class="blog-post-thumbnail">
                                <img src="{{$blog->thumbnail}}" alt="post-thumbnail">
                            </div>
                            <div class="post-info">
                                <div class="post-description">
                                    <h4 class="post-title">
                                        <div class="anchor-style">{{$blog->title}}</div>
                                    </h4>
                                    <div class="post-meta">
                                        <div class="blog-post-author anchor-style">
                                            <!-- <span class='bx bx-user text-secondary'></span> -->
                                            <img src="https://kaykewalk.com/storage/files/1/Janet.jpeg" alt="Webeesocial Logo">
                                            <span class="meta-value ms-1">Janet A.</span>
                                        </div>
                                        <div class="post-date anchor-style">
                                            <div>{{ \Carbon\Carbon::parse($blog->publish_date)->format('M d, Y') }}</div>
                                            {{-- <a href="" class="post-comment">
                                                                <span class="post-meta-number">0</span>
                                                                <span class="post-meta-label">comment</span>
                                                            </a> --}}
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
                @empty
                @if(request()->has('search') && request()->get('search') != '')
                <h1 class="text-center text-warning">No blogs found with</h1>
                <h1 class="text-center text-warning">"{{ request()->get('search') }}"</h1>
                @else
                <h1 class="text-center text-warning">No blogs found</h1>
                @endif
                @endforelse
                {{ $blogs->links() }}
            </div>
        </div>
    </div>
</section>




@endsection