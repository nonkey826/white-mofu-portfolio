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

    public function search(Request $request)
{
    $todos = Todo::with('category')
                ->categorySearch($request->category_id)
                ->keywordSearch($request->keyword)
                ->get();

    $categories = Category::all();

    return view('todos.index', compact('todos', 'categories'));
}

public function update(Request $request)
{
    // バリデーション
    $request->validate([
        'id' => 'required|exists:todos,id',
        'content' => 'required|max:255',
    ]);

    // 更新
    $todo = Todo::find($request->id);
    $todo->content = $request->content;
    $todo->save();

    return redirect()->route('todos.index')->with('success', '更新しました！');
}
//削除
public function destroy(Request $request)
{
    Todo::find($request->todo_id)->delete();

    return redirect()->route('todos.index')->with('success', '削除しました！');
}



}
