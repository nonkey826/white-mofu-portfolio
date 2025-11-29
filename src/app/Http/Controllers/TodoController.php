<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;

class TodoController extends Controller
{
    public function index()
    {
        // Todo一覧（カテゴリのリレーション付き）
        $todos = Todo::with('category')->get();

        // カテゴリ一覧
        $categories = Category::all();

        return view('todos.index', compact('todos', 'categories'));
    }

    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        // 保存
        Todo::create([
            'content' => $request->content,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('todos.index')->with('success', '登録しました！');
    }
}
