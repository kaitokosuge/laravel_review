<x-app-layout>
    <article class="article bg-blue-700 text-white p-[150px]">
        <h1 class="font-bold text-8xl">{{ $post->title }}</h1>
        <p>{{ $post->bool === 1 ? '選択肢１' : '選択肢２' }}</p>
        <h2 class="font-bold text-4xl mt-10">コメント</h2>
        <div class="comment-area">

        </div>
    </article>
</x-app-layout>