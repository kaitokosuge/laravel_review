<x-app-layout>
    <article class="article bg-blue-700 text-white p-[150px]">
        <h1 class="font-bold text-8xl">{{ $post->title }}</h1>
        <p>{{ $post->bool === 1 ? '選択肢１' : '選択肢２' }}</p>
        <h2 class="font-bold text-4xl mt-10">コメント</h2>
        <div class="comment-area">
            <ul>
                @foreach($post->comments as $comment)
                <li class="mt-5">
                    <p>user:{{ $comment->user->name }}</p>
                    <p class="font-bold">comment:<span class="text-4xl">{{ $comment->comment }}</span></p>
                    <div>   
                        @foreach($comment->replies as $reply) 
                        <p>返信したユーザー{{ $reply->user->name }}</p>
                        <p>{{ $reply->reply }}</p>
                        @endforeach
                    </div>
                </li>
                <form action={{"/reply/" . $post->id . "/{$comment->id}"}} method="post">
                    @csrf
                    <input class="text-black"type="text" name="reply[reply]"/>
                    <button type="submit">送信</button>
                </form>
                @endforeach
            </ul>
        </div>
        <form action={{"/post/comment/" . $post->id}} method="POST">
            @csrf
            <input class="text-gray-900"type="text" name="comment" placeholder="コメントを入力してね"/>
            <button type="submit">送信</button>
        </form>
    </article>
</x-app-layout>