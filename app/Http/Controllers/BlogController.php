<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class BlogController extends Controller
{
    public function index()
    {
        $data = Post::leftJoin('categories as c','c.id','posts.category_id')
                ->leftJoin('users as u','u.id','posts.user_id')
                ->select(
                    'posts.id','posts.title','posts.content','posts.image',
                    'c.name as category','u.name as author'
                )
                ->paginate(5);
        return view('welcome',compact('data'));
    }

    public function create()
    {
        return view('pages.posts.create');
    }
}
