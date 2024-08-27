<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $tags = Tag::all();
        return view('admin.tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'tag_name' => 'required|unique:tags,name'
        ];

        $customMessages = [
            'tag_name.required' => 'Tag Name is required',
            'tag_name.unique' => 'Tag Name is already exists'
        ];

        $this->validate($request, $rules, $customMessages);

        $tags = new Tag();
        $tags->name = $request->tag_name; 
        
        if($tags->save()){
            $this->alert('Success','Tag Saved successfully','success');
            return redirect()->route('tags');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tags)
    {
        return view ('admin.tags.edit',compact('tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tags)
    {
        $request -> validate([
            'tag_name' => 'required'
        ]);

        $tags->name = $request->tag_name; 

        if($tags->save()){
            $this->alert('Success', 'Tags Updated Successfully', 'success');
            return redirect()->route('tags');
        }
        $this->alert('error', 'Something Went Wrong', 'error');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tags)
    {
        if($tags->delete()){
            $this->alert('Success','Tags Removed successfully','success');
            return redirect()->route('tags');

        }
        $this->alert('error','Something went wrong','danger');
        return redirect()->back();
    }
}
