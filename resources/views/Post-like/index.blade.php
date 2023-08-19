<x-app-layout>
    <div class="bg-red-700 text-white p-[150px]">
        <div class="flex">
            <h1 class="font-bold text-8xl">Like<span class="text-sm block mt-1">いいね機能</span></h1>
        </div>
        <div class="mt-[100px] border-t pt-5">
            <h2 class="font-bold text-2xl">1.投稿に対して認証済みユーザーがいいねできる機能--Lv1</h2>
            <strong class="block mt-10">使用ファイル</strong>
            <ul>
                <li class="mt-5">
                    <p>・Model</p>
                    <p>Like/likePost.php</p>
                    <p>Like/likeLike.php</p>
                </li>
                <li class="mt-5">
                    <p>・View</p>
                    <p>Like/index.blade.php</p>
                    <p>Like/show.blade.php</p>
                </li>
                <li class="mt-5">
                    <p>・Controller</p>
                    <p>Like/likePostController.php</p>
                </li>
                <li class="mt-5">
                    <p>・migration</p>
                    <p>投稿table:like_posts</p>
                    <p>いいねtable:like_likes</p>
                </li>
            </ul>
            <strong class="block mt-10">現物</strong>
            
            <strong class="block mt-10">実装する際の考え方</strong>
            <ul>
                <li class="mt-5">
                    <p>・コメント(string)はcommentsテーブルに保存する。</p>
                </li>
                <li class="mt-5">
                    <p>・またコメントした記事のid(foreignId)を保存しておくことで記事に紐づいたコメントをリレーションで取り出し表示させることができる</p></p>
                </li>
            </ul>
        </div>
    </div>
</x-app-layout>