<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // 入力ページ
    public function index()
    {
        return view('contact.index');
    }

    // 確認ページ
    public function confirm(Request $request)
    {
        // バリデーション
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|max:200',
        ]);

        // 入力値を取得
        $inputs = $request->all();

        return view('contact.confirm', [
            'inputs' => $inputs
        ]);
    }

    // 完了ページ（表示だけ）
    public function thanks(Request $request)
    {
        $request->session()->regenerateToken();
        return view('contact.thanks');
    }

    // ★★★ 追加するメソッド ★★★
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|max:200',
        ]);

        // 保存データ成形
        $inputs = [
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel ?? null,
            'content' => $request->message,
        ];

        // 保存
        Contact::create($inputs);

        // 二重送信防止
        $request->session()->regenerateToken();

        return view('contact.thanks');
    }

    public function adminIndex()
{
    $contacts = Contact::orderBy('id', 'desc')->paginate(10);
    return view('admin.contacts.index', compact('contacts'));
}

public function show($id)
{
    $contact = Contact::findOrFail($id);
    return view('admin.contacts.show', compact('contact'));
}

public function destroy($id)
{
    Contact::findOrFail($id)->delete();
    return redirect()->route('admin.contacts.index')->with('success', '削除しました');
}



}
