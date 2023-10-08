<x-app-layout>
    <div class="bg-pink-500 text-white p-[150px]">
        <div class="flex">
            <h1 class="font-bold text-8xl">OGP<span class="text-sm block mt-1">OGP情報取得機能</span></h1>
        </div>
        <form action="/post/url"method="post" class="mt-10">
            @csrf
            <input type="title" name="url" placeholder="url" class="p-5 rounded-md w-[500px]">
            <button type="submit">save</button>
        </form>
        <div class="opp-area mt-20">
            <h2 class="font-bold text-xl">取得したOGP情報</h2>
            @foreach($ogps as $ogp)
                <div class="mt-10">
                    {{ $ogp->title }}
                    <img src={{ $ogp->image }} class="w-[200px]" alt="no image"/>
                    {{ $ogp->description }}
                    <a href={{ $ogp->url }}>{{ $ogp->url }}</a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>