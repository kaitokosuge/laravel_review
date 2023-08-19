<x-app-layout>
    <div class="bg-gray-100 text-black p-[150px]">
        <h1 class="font-bold text-8xl"><span class="text-3xl">welcome to </span><br>Perfect Blog</h1>
        <div class="mt-[100px] border-t border-gray-700 pt-5">
            <h2 class="font-bold text-5xl mt-10">Nav</h2>
            <nav class="mt-5">
                <div class="mt-20">
                    <h3 class="font-bold text-blue-700 text-2xl"><a href="/comments">コメント機能→</a></h3>
                    <ul>
                        <li class="mt-5"><a class="font-bold text-blue-700"href="/comments">投稿に対して認証済みユーザーがコメントできる機能→</a></li>
                    </ul>
                </div>
                <div class="mt-20">
                    <h3 class="font-bold text-red-700 text-2xl"><a href="/likes">いいね機能→</a></h3>
                    <ul>
                        <li class="mt-5"><a class="font-bold text-red-700"href="/likes">投稿に対して認証済みユーザーがいいねできる機能→</a></li>
                        <li class="mt-5"><a class="font-bold text-red-700"href="/likes/#ajax">(jquery ajax使用)投稿に対して認証済みユーザーがいいねできる機能→</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</x-app-layout>