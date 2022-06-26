<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newPost = new Post();
        $newPost->title = $data['title'];
        $newPost->content = $data['content'];
        $newPost->published = isset($data['published']);
        $newPost->category_id = isset($data['category_id']);
        $slug = Str::of($data['title'])->slug("-");
        $count = 1;
        while (Post::where('slug', $slug)->first()) {
            $slug = Str::of($data['title'])->slug("-") . "{$count}";
            $count++;
        }
        $newPost->slug = $slug;
        $newPost->save();

        return redirect()->route('admin.post.show', $newPost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();

        if ($post->title != $data['title']) {
            $post->title = $data['title'];
            $slug = Str::of($post->title)->slug("-");
            if ($slug != $post->slug) {
                $post->slug = $this->getSlug($post->title);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post->delete();
        return redirect()->route('admin.post.index')->with("message", "Post with id:{$post->id} successfully deleted !");
    }

    @param string
    @return string

    private fiunction getSlug($title);{
        $slug = Str::of($data['title'])->slug("-");
        $count = 1;

        while(Post::where("slug, $slug")->first()){
            $slug = Str::of($data['title'])->slug("-") . "{$count}";
            $count++;
        }

        return $slug;
    }


}
