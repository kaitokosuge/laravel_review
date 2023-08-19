<x-app-layout>
    <div class="bg-blue-700 text-white p-[150px]">
        <div class="flex">
            <h1 class="font-bold text-8xl">Comment<span class="text-sm block mt-1">コメント機能</span></h1>
        </div>
        <div class="mt-[100px] border-t pt-5">
            <h2 class="font-bold text-2xl">1.投稿に対して認証済みユーザーがコメントできる機能--Lv1</h2>
            <strong class="block mt-10">使用ファイル</strong>
            <ul>
                <li class="mt-5">
                    <p>・Model</p>
                    <p>Comment/commentPost.php</p>
                </li>
                <li class="mt-5">
                    <p>・View</p>
                    <p>Comment/index.blade.php</p>
                </li>
                <li class="mt-5">
                    <p>・Controller</p>
                    <p>Comment/commentPostController.php</p>
                </li>
                <li class="mt-5">
                    <p>・migration</p>
                    <p>投稿table:comment_posts</p>
                    <p>コメントtable:comment_comments</p>
                </li>
            </ul>
            <strong class="block mt-10">現物</strong>
            <form action="/comments" method="POST" class="mt-10">
                @csrf
                <p>blog title</p>
                <input class="text-black p-5 rounded-md"type="text" name="commentpost[title]"/>            
                <label for="0">true</label>
                <input type="radio" name="commentpost[bool]" value="1" id="0" checked class="text-green-400"/>   
                <label for="1">false</label>
                <input type="radio" name="commentpost[bool]" value="2" id="1" class="text-green-400"/>
                <button type="submit" class="block">保存</button>
            </form>
            <div class="grid mt-10 grid-cols-3 gap-5">
                @foreach($posts as $post)
                <article class="bg-white rounded-md text-black p-10">
                    <p>blog title</p>
                    <p class="fotn-bold text-4xl">{{ $post->title }}</p>
                    <p>ブール型:{{ $post->bool == 1 ? '選択肢１':'選択肢２'}}</p>
                    <a class="text-3xl text-blue-500" href={{"/comments/" . $post->id}}>read</a>
                    <form action={{"/comments/delete/" . $post->id}} method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">削除</button>
                    </form>
                </article>
                @endforeach
            </div>
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