<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\post;
use App\Models\tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->check()){
            $posts = Post::all();
            return view('posts.index', compact('posts'));
        }
        else{
            return response()->json([
                'message' => 'Please Login First'
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->check()){
            $categorys = category::all();
            $tags = tag::all();
            return view('posts.create',compact('categorys','tags'));
        }
        else{
            return response()->json([
                'message' => 'Please Login First'
            ]);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $post = post::create([
            'title' => $request->title,
            'user_id' =>$request-> user_id,
            'body' => $request->body,
//            'category' => $request->category,
        ]);
        $post->save();
        $post->category()->sync($request->category);
        $post->tag()->sync($request->tag);


        return redirect('posts/show')->with('success','Post created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
//        dd($post->all());
        if (auth()->check()){
            $category = category::all();
            $tag = tag::all();
            $listsCat = [];
            foreach($post->category as $key => $value)
            {
                $listsCat[] =  $value->name;
            }
            $listtag = [];
            foreach($post->tag as $key => $value)
            {
                $liststag[] =  $value->name;
            }

            return view('posts.edit', compact(['post','listsCat','category','liststag','tag']));

        }
        else{
            return response()->json([
                'message' => 'Please Login First'
            ]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        if (auth()->check()){
            $post->title = $request->title;
            $post->body = $request->body;
//            $post->category->name = $request->category;
            $post->save();
            $post->category()->sync($request->category);
            $post->tag()->sync($request->tag);
            return redirect('posts/show')->with('success','Post updated successfully!');
        }
        else{
            return response()->json([
                'message' => 'Please Login First'
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
//        dd($post);
        $post->delete();
        return redirect('posts/show')->with('success','Post deleted successfully!');
    }
}
