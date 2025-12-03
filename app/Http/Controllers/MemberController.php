<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    // 一覧
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    // 新規フォーム
    public function create()
    {
        return view('members.create');
    }

    // 保存
    public function store(Request $request)
    {
        Member::create([
            'name' => $request->name,
            'learning_hours' => $request->learning_hours,
            'comment' => $request->comment,
        ]);

        return redirect()->route('members.index');
    }

    // 詳細
    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    // 編集フォーム
    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    // 更新
    public function update(Request $request, Member $member)
    {
        $member->update([
            'name' => $request->name,
            'learning_hours' => $request->learning_hours,
            'comment' => $request->comment,
        ]);

        return redirect()->route('members.index');
    }

    // 削除
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index');
    }
}
