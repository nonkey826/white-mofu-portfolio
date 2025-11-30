<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dog;

class DogController extends Controller
{
    // 一覧（検索 + 並び替え対応）
    public function index(Request $request)
    {
        $query = Dog::query();

        // 🔍 キーワード検索（名前＋犬種）
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%")
                  ->orWhere('breed', 'like', "%{$keyword}%");
            });
        }

        // ↕ 並び替え
        if ($request->sort === 'name_asc') {
            $query->orderBy('name', 'asc');

        } elseif ($request->sort === 'name_desc') {
            $query->orderBy('name', 'desc');

        } elseif ($request->sort === 'id_desc') {
            $query->orderBy('id', 'desc');

        // ⭐ 体重の軽い順
        } elseif ($request->sort === 'weight_asc') {
            $query->orderBy('weight', 'asc');

        // ⭐ 体重の重い順
        } elseif ($request->sort === 'weight_desc') {
            $query->orderBy('weight', 'desc');

        } else {
            // デフォルト（ID昇順）
            $query->orderBy('id', 'asc');
        }

        $dogs = $query->get();

        return view('dogs.index', compact('dogs'));
    }

    // 詳細
    public function show($id)
    {
        $dog = Dog::findOrFail($id);
        return view('dogs.show', compact('dog'));
    }

    // 作成フォーム
    public function create()
    {
        return view('dogs.create');
    }

    // 保存
    public function store(Request $request)
    {
        Dog::create($request->all());
        return redirect()->route('dogs.index');
    }

    // 編集フォーム
    public function edit($id)
    {
        $dog = Dog::findOrFail($id);
        return view('dogs.edit', compact('dog'));
    }

    // 更新
    public function update(Request $request, $id)
    {
        $dog = Dog::findOrFail($id);
        $dog->update($request->all());
        return redirect()->route('dogs.index');
    }

    // 削除
    public function destroy($id)
    {
        Dog::findOrFail($id)->delete();
        return redirect()->route('dogs.index');
    }

    // 押しもふ（お気に入り）
    public function choose($id)
    {
        session(['favorite_dog_id' => $id]);
        return redirect('/result');
    }
}
