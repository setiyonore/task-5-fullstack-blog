<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
class BlogController extends Controller
{
    public function index()
    {
        $data = Post::leftJoin('categories as c','c.id','posts.category_id')
                ->leftJoin('users as u','u.id','posts.user_id')
                ->select(
                    'posts.id','posts.title','posts.content','posts.image',
                    'c.name as category','u.name as author','posts.created_at as date'
                )
                ->orderBy('posts.id','DESC')
                ->paginate(5);
        return view('welcome',compact('data'));
    }

    public function create()
    {
        $category = Category::select('id','name')->get();
        return view('pages.posts.create',compact('category'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'category' => 'required',
            'content' => 'required'
        ]);
        $user = auth()->user();
        //upload image
        $image = $request->file('image');
        $image->storeAs('public/post',$image->getClientOriginalName());
        //store data
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $image->getClientOriginalName(),
            'category_id' => $request->category,
            'user_id' => $user->id,
        ]);
        return redirect()->route('blog.home');
    }

    public function read($id)
    {
        $data = Post::leftJoin('categories as c','c.id','posts.category_id')
                ->leftJoin('users as u','u.id','posts.user_id')
                ->select(
                    'posts.id','posts.title','posts.content','posts.image',
                    'c.name as category','u.name as author','posts.created_at as date',
                    'u.id as user_id'
                )
                ->where('posts.id',$id)
                ->first();
        return view('pages.posts.detailPost',compact('data'));
    }

    public function edit($id)
    {
        $post = $data = Post::leftJoin('categories as c','c.id','posts.category_id')
        ->leftJoin('users as u','u.id','posts.user_id')
        ->select(
            'posts.id','posts.title','posts.content','posts.image',
            'c.name as category','u.name as author','posts.created_at as date',
            'u.id as user_id','posts.category_id'
        )
        ->where('posts.id',$id)
        ->first();

        $category = Category::select('id','name')->get();
        return view('pages.posts.edit',compact('post','category'));
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'category' => 'required',
            'content' => 'required'
        ]);
        $post = Post::findOrFail($request->id);
        if($request->file('image')){
            $image = $request->file('image');
            $image->storeAs('public/post',$image->getClientOriginalName());
            $post->update([
                'title' => $request->title,
                'category' => $request->category,
                'content' => $request->content,
                'image' => $image->getClientOriginalName(),
            ]);
        } else {
            $post->update([
                'title' => $request->title,
                'category' => $request->category,
                'content' => $request->content,
            ]);
        }

        return redirect()->route('blog.home');
    }

    public function destroy($id)
    {
        $data = Post::findOrFail($id);
        $data->delete();
        return redirect()->route('blog.home');
    }
}
