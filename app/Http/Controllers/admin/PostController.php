<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

use App\Mail\SendPostEmail;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        $categories = Category::all();
        $posts = Post::all();
        return view('admin.posts.index', compact('posts', 'categories', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.posts.create', compact('categories', 'tags'));
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
            'title' => 'required|max:150|string',
            'content' => 'required|max:65535|string',
            'public' => 'sometimes|accepted',
            'category_id' => 'exists:categories,id|nullable', //l'id che arriva dalla select deve esistere nella tabella categories nella colonna id
            'tag_id' => 'exists:tags,id|nullable', //l'id che arriva dalla select deve esistere nella tabella tag nella colonna id
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();
        $newPost = new Post();
        $newPost->fill($data);
        $newPost->slug = $this->getSlug($data['title']);
        $newPost->public = isset($data['public']);
        if(isset($data['image'])){
            $newPost->image = Storage::disk('public')->put('uploads', $data['image']);
        }
        $newPost->save();

        // se ci sono dei tags associati, li associo al post appena creato
        if(isset($data['tag_id'])) {
            $newPost->tags()->sync($data['tag_id']);
        }

        Mail::to('g.lele_1998@hotmail.it')->send(new SendPostEmail($newPost));

        return redirect()->route('admin.posts.show', $newPost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();

        $postTags = $post->tags->map(function ($tag) {
            return $tag->id;
        })->toArray();

        return view('admin.posts.edit', compact('post', 'categories', 'tags', 'postTags'));
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
        $request->validate([
            'title' => 'required|max:150|string',
            'content' => 'required|max:65535|string',
            'public' => 'sometimes|accepted',
            'category_id' => 'exists:categories,id|nullable',
            'tag_id' => 'exists:tags,id|nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();
        if( $post->title != $data['title'] ) {
            $post->slug = $this->getSlug($data['title']);
        }
        $post->fill($data);
        $post->public = isset($data['public']);
        if(isset($data['image'])){
            $post->image = Storage::disk('public')->put('uploads', $data['image']);
        }
        $post->save();

        //Se sono settati dei tag allora vengono aggiunti, sennò non viene aggiunto nulla
        $tags = isset($data['tag_id']) ? $data['tag_id'] : [];

        $post->tags()->sync($tags);

        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->image) {
            Storage::disk('public')->delete('uploads', $post->image);
        }

        $post ->delete();
        
        return redirect()->route('admin.posts.index');
    }

    private function getSlug($title) {
        $slug = Str::slug($title, '-');
        $count = 1;

        while( Post::where('slug', $slug)->first() ) {
            $slug = Str::slug($title, '-') . "-{$count}";
            $count++;
        }

        return $slug;
    }
}
