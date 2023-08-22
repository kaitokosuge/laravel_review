<x-app-layout>
    <div class="bg-red-700 text-white p-[150px]">
        <div class="flex">
            <h1 class="font-bold text-8xl">Like<span class="text-sm block mt-1">いいね機能</span></h1>
        </div>
        <div class="mt-[100px] border-t pt-10">
            <h2 class="font-bold text-3xl">1.投稿に対して認証済みユーザーがいいねできる機能--Lv1</h2>
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
            <strong class="text-2xl block mt-10">現物</strong>
            <form action="/likes/post" method="post">
                @csrf
                <p>title</p>
                <input class="bg-white rounded-md p-1 text-black"type="text"name="post[title]"/>
                <button class="text-black font-bold p-[5px] bg-yellow-300 rounded-md"type="submit">保存</button>
            </form>
            <div class="grid mt-10 grid-cols-3 gap-5">
                @foreach($posts as $post)
                <article class="p-5 rounded-md bg-white text-black">
                    <h2 class="font-bold text-3xl">{{ $post->title }}</h2>
                    <div class="flex justify-between">
                        <div>
                            <a href="" class="text-blue-600 font-bold block">read</a>
                            <form action={{"/delete/post/" . $post->id}} method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="block">削除</button>
                            </form>
                        </div>
                        @if($post->is_liked_by_user())
                            <form action={{ "/unlike/" . $post->id }} method="post">
                                @csrf
                                @method('DELETE')
                                <p class="text-center font-bold">{{ $post->likes->count() }}</p>
                                <button class="block text-4xl js-likeBtn">❤️</button>
                            
                            </form>
                        @else
                            <form action={{"/like/" . $post->id}} method="post">
                                @csrf
                                <p class="text-center">{{ $post->likes->count() }}</p>
                                <button type="submit" class="block text-4xl js-likeBtn">🖤</button>
                            </form>
                        @endif
                    </div>
                </article>
                @endforeach
            </div>
            <strong class="block mt-10">実装する際の考え方</strong>
            <ul>
                <li class="mt-5">
                    <p>・投稿がいいねされている場合・されていない場合のボタン表示をif文（ディレクティブ）で分岐させて表示を切り替える。</p>
                    <p>・$post->is_liked_by_user()</p>
                    <p>$postからModelで定義した関数is_liked_by_user()を使っていいねされているかどうかをtrue,falseで返してもらう</p>
                    <p>is_liked_by_user()内ではまず認証済みのユーザー、つまりいいねを押そうとしている人自身のidを取得する。</p>
                    <p>次にpostsからlikesテーブルへのリレーションを使用しlikesテーブルにアクセス、likesテーブルからuser_idを抽出し配列に格納する</p>
                    <p>最後にいいねを押そうとしている人自身のidがその配列内に含まれるかどうかでif文を作成しあればtrue,なければfalseを返してもらいブレードの＠ifで表示の条件分岐ができれば完了</p>
                    <p></p>
                </li>
                <li class="mt-5">
                    <p>・コントローラでユーザーid、記事idを保存。delete操作はwhereでuser_id,post_idを指定し削除処理をする</p>
                </li>
            </ul>
        </div>
        <div id="ajax"class="mt-[100px] border-t pt-10">
            <h2 class="font-bold text-3xl">2.（jquery ajax使用）投稿に対して認証済みユーザーがいいねできる機能--Lv2</h2>
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
            <strong class="text-2xl block mt-10">現物</strong>
            
            <div class="grid mt-10 grid-cols-3 gap-5">
                
            </div>
            <strong class="block mt-10">実装する際の考え方</strong>
            <ul>
                <li class="mt-5">
                    
                </li>
                <li class="mt-5">
                    
                </li>
            </ul>
        </div>
        <div id="ajax"class="mt-[100px] border-t pt-10">
            <h2 class="font-bold text-3xl">3.（JS FetchAPI使用）投稿に対して認証済みユーザーがいいねできる機能--Lv3</h2>
            <strong class="block mt-10">使用ファイル</strong>
        </div>
    </div>
</x-app-layout>