<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{



    public function latest()
    {
        $latestPosts = Post::latest();

        return view('blog.index' , ['latestPost' => $latestPosts]);
    }



    public function singlePos($id)
    {
        $post = Post::find($id);

        return view('blog.show' , ['post' => $post]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
         return view('dashboard.post-table' , ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        return view('dashboard.post-form' , ['post' => $post]);
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
            'title' => 'required'
        ]);


        $post = new Post();
        $post->title = $request->title;
        $post->tag_line = $request->tag_line;
        $post->content = $request->content;
        $post->author_id = Auth::id();

        if($request->featured_image){
            $image = $request->file('featured_image');
            $fileName = time() . '.webp';
            Image::make($image)->save(storage_path('app/public/' . $fileName));

            $post->featured_image = $request->fileName;
        }

        $post->save();

        return redirect()->route('post.index')->withMessage('Post posted succesfully.');

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
    public function edit($id)
    {

        $post = Post::find($id);

        return view('dashboard.post-form' , ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $post = Post::find($id);

       $post->title = $request->title;
       $post->content = $request->content;
       $post->tag_line = $request->tag_line;
       $post->author_id = Auth::id();

       if($request->featured_image){
           $image = $request->file('featured_image');
           $fileName = time() . '.webp';
           Image::make($image)->save(storage_path('app/public/' . $fileName));

           $post->featured_image = $fileName;
       }

       $post->save();

       return redirect()->route('post.index')->withMessage('Post updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * uploading images to storage.
     *
     */
    public function uploadImage(Request $request)
    {
        $image = $request->file('file');
        $fileName = time() . '.webp';
        Image::make($image)->save(storage_path('app/public/' . $fileName));

        return response()->json([
            'location' => '/storage/'. $fileName
        ]);

    }




}
