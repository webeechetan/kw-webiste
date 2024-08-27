<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         $blogs = Blog::where('type',1)->get();
        // $blogs = Blog::where('type', 1)
        //      ->orderBy('created_at', 'desc')
        //      ->get();
        return view ('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view ('admin.blog.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'blog_title' => 'required',
            'description' => 'required',
            'slug' => 'required',
        ]);

        $blogs = new Blog();

        $blogs->publish_date = $request->publish_date;
        $blogs->slug = $request->slug;
        $blogs->title = $request->blog_title;
        $blogs->category_id = $request->category_id;

        // if($request->has('tags')  && $request->tags){
        //     $tags = implode(',',$request->tags);
        //     $blogs->tags_id = $tags;
        // }

        $blogs->banner = $request->banner;
        $blogs->short_description = $request->short_description;
        $blogs->description = $request->description;
        $blogs->meta_title = $request->meta_title;
        $blogs->meta_description = $request->meta_description;
        $blogs->thumbnail = $request->thumbnail;
        $blogs->banner = $request->banner;
        $blogs->banner_thumb_alt = $request->alt;
        $blogs->type = 1;

       

        if($blogs->save()){

            if ($request->has('tags') && $request->tags) {
                $tags = $request->tags;
                $blogs->tags()->attach($tags);
            }


            $this->alert('Success','Blog Added successfully','success');
            return redirect()->route('blog.index');
        }
        $this->alert('error','Something went wrong','error');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.blog.edit',['blogs' => $blog ,'categories' => $categories,'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {

       
        $request ->validate([
            'blog_title' => 'required',
            'description' => 'required',
            'thumbnail' => 'required',
        ]);



        $blog->publish_date = $request->publish_date;
        $blog->slug = $request->slug;
        $blog->title = $request->blog_title;
        $blog->category_id = $request->category_id;
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        $blog->meta_title = $request->meta_title;

        


        $blog->meta_description = $request->meta_description;
       
        $blog->thumbnail = $request->thumbnail;
        
        $blog->banner = $request->banner;
        
        if($blog->save()){ 

            
                $blog->tags()->sync($request->tags);
            


            $this->alert('Success','Blog Updated successfully','success');
            return redirect()->route('blog.index');
        }
        $this->alert('error','Something went wrong','danger');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if($blog->delete()){
            $this->alert('Success','Blog Deleted successfully','success');
            return redirect()->route('blog.index');

        }else{
            $this->alert('error','Something went wrong','danger');
            return redirect()->back();  
        }
    }
}
