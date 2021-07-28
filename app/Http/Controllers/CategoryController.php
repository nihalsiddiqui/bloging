<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\CategoryPost;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = category::all();
        return view('category.index',compact('categorys')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->check()) {

            return view('category.create');
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
       if (auth()->check()){
           $category = Category::create([
               'name' => $request-> name,
           ]);
           $category->save();
//           $category->post()->sync($request->post_id);
           return redirect('category/show')->with('success','Category created successfully!');

       }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('category.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        if (auth()->check()){
            $category->name = $request->name;
//            $post->category = $request->category;
            $category->save();
            return redirect('category/show')->with('success','Post updated successfully!');
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
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
       $category->delete();
        return redirect('category/show')->with('success','Post deleted successfully!');

    }
}
