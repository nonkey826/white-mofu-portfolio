<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;   // ← これが必要！！

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')
                         ->with('success', 'カテゴリを追加しました！');
    }

    public function update(CategoryRequest $request)
    {
        $category = Category::find($request->id);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')
                         ->with('success', 'カテゴリを更新しました！');
    }

    public function destroy(Request $request)
    {
        $category = Category::find($request->id);
        $category->delete();

        return redirect()->route('categories.index')
                         ->with('success', 'カテゴリを削除しました！');
    }
}
