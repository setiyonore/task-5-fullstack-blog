<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::select('id','name')->paginate(5);
        return view('pages.category.index',compact('data'));
    }

    public function create()
    {
        return view('pages.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);
        $user = auth()->user();
        Category::create([
            'name' => $request->name,
            'user_id' => $user->id,
        ]);
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $data = Category::findOrFail($id);
        return view('pages.category.edit',compact('data'));
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);
        $category = Category::findOrFail($request->id);
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $data = Category::findOrFail($id);
        $data->delete();
        return redirect()->route('category.index');
    }
}
