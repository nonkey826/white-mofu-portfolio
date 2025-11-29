<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            管理画面トップ（白もふ図鑑）
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">nozomi さん、ログイン中です 🐾</p>

                    <p class="mb-2 font-bold">管理メニュー</p>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('dogs.index') }}" class="text-blue-500 underline">
                                ・白もふ図鑑（一覧）を開く
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dogs.create') }}" class="text-blue-500 underline">
                                ・白もふを新しく登録する
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('members.index') }}" class="text-blue-500 underline">
                                ・メンバー一覧を開く
                            </a>
                        </li>
                    </ul>

                    <p class="mt-6 text-sm text-gray-400">
                        ※ 削除・編集のボタン自体は各ページ
                        （例：白もふ一覧・詳細画面）の中に置いておけばOKです。
                        それらのルートは <code>auth</code> ミドルウェアで守られています。
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
