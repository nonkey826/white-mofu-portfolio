<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dog;

class DogController extends Controller
{
    // 一覧
    public function index()
    {
        $dogs = Dog::all();
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

    // 押しもふ
    public function choose($id)
    {
        session(['favorite_dog_id' => $id]);
        return redirect('/result');
    }

    // ▼▼ 検索フォーム表示
    public function find()
    {
        return view('dogs.find');
    }

    // ▼▼ 検索処理
    public function search(Request $request)
    {
        $input = $request->input;
        $item = Dog::where('name', 'LIKE', "%{$input}%")->first();

        return view('dogs.find', compact('item', 'input'));
    }
}
