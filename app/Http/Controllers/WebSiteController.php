<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use App\Models\Blog;
use App\Models\ContactUs;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class WebSiteController extends Controller
{
    public $meta;

    public function __construct()
    {
        $url = Route::current()->uri();
        $meta = Meta::where('url',$url)->first();
        if($meta){
            $this->meta = $meta;
        }else{
            $this->meta = new Meta();
        }
    }

    // public function viewIndex(){
    //     return view('frontend.index',['meta'=>$this->meta]);
    // }

    public function viewAbout(){
        dd($this->meta);
    }

    public function viewIndex(){
    
        return view('frontend.index'); 
      }


    public function viewBlog(Request $request){

        // if($request->has('search')){
        //     $blogs = Blog::where('title','like','%'.$request->search.'%')
        //     ->orWhere('description','like','%'.$request->search.'%')
        //     ->orWhereHas('tags',function($query) use($request){
        //         $query->where('name','like','%'.$request->search.'%');
        //     })
        //     ->paginate(6);

        if ($request->has('search')) {
           $blogs = Blog::where('title', 'like', '%' . $request->search . '%')
            ->orWhere('description', 'like', '%' . $request->search . '%')
            ->orWhereHas('tags', function($query) use($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->orWhereHas('category', function($query) use($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->paginate(6);
        }else{
            // $blogs = Blog::paginate(6);
            $blogs = Blog::where('type', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(6);
        }


      return view('frontend.blog', compact('blogs')); 
    }

    public function viewBlogInner($slug){ 
       
        $categoryies = Category::all();
        $recentBlog = Blog::latest()->first();

        $blog = Blog::where('slug',$slug)->first();

        if (!$blog) {
            
           // return redirect()->route('viewBlog')->with('error', 'Blog not found.');
            // Alternatively, you could use:
            // abort(404, 'Blog not found.');
            abort(404, 'Blog not found.');

        }

        $tags = Tag::all();
        
        $related_blogs = Blog::where('category_id',$blog->category_id)
        ->where('id','!=',$blog->id)
        ->limit(2)->get();



        return view('frontend.blog-inner',compact('blog','categoryies','recentBlog','related_blogs','tags'));
    }

    public function viewContactUsPage(){
        return view('frontend.contact-us');
    }

    public function viewContactUs(Request $request) {


        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits_between:7,12|numeric',
            'company_name' => 'required',
            'message' => 'required',
        ]);

        

        $contact = new ContactUs();

      
        $contact->name = $request['name'];
        $contact->email = $request['email'];
        $contact->phone = $request['phone'];
        $contact->company_name = $request['company_name'];
        $contact->message = $request['message'];


        if($contact->save()) {
           
            return redirect()->route('viewIndex')->with('message', 'Thank you for submitting');
        }
         return redirect()->back();
       
        
    }
    public function viewDemo(){
        return view('frontend.demo');
    }


}
