<x-app-layout>
    <article class="article bg-blue-700 text-white p-[150px]">
        <h1 class="font-bold text-8xl">{{ $post->title }}</h1>
        <p>{{ $post->bool === 1 ? '選択肢１' : '選択肢２' }}</p>
        <h2 class="font-bold text-4xl mt-10">コメント</h2>
        <div class="comment-area">
            <ul>
                @foreach($post->comments as $comment)
                <li>
                    <p>{{ $comment->comment }}</p>
                    <p>{{ $comment->user->name }}</p>
                </li>
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