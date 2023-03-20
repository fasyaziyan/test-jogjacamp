<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Notifications\CategoryNotification;
use Illuminate\Support\Facades\Notification;
use App\User;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $categories = Category::where('name', 'like', "%$search%")->paginate(10);

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'is_publish' => 'required|boolean',
        ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->is_publish = $request->input('is_publish');
        $category->save();

        $user = User::all();
        Notification::send($user, new CategoryNotification($category, 'created'));

        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'is_publish' => 'required|boolean',
        ]);

        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->is_publish = $request->input('is_publish');
        $category->update();

        $user = User::all();
        Notification::send($user, new CategoryNotification($category, 'updated'));

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('categories.index');
    }
}
