<x-app-layout>
    <div class="bg-green-700 text-white p-[150px]">
        <h1 class="font-bold text-8xl">Follow<span class="text-sm block mt-1">フォロー機能</span></h1>
        <div class="mt-[100px] border-t pt-5">
                <h2 class="font-bold text-3xl">1.ユーザーが他のユーザーをフォローできる機能--Lv1</h2>
                <strong class="block mt-10">現物</strong>
                <p class="mt-5">ユーザ一覧</p>
                <div class="text-black grid mt-10 grid-cols-3 gap-5">
                    @foreach($users as $user)
                    <div class="bg-white rounded-md p-5">
                        <p class="text-xs">名前</p>
                        <p class="font-bold ">{{ $user->name }}</p>
                        <p class="text-xs">メールアドレス</p>
                        <p class="font-bold ">{{ $user->email }}</p>
                        <form action={{"/follow/" . $user->id}} method="post">
                            @csrf
                            <button type="submit" >フォローする</button>
                        </form>
                    </div>
                    @endforeach
                </div>
                <strong class="block mt-10">実装する際の考え方</strong>
                <ul>
                    <li class="mt-5">
                        <p>・データベースについて</p>
                        <p>フォロー機能を作成する際、データベースに貯める必要があるのはフォローされた人のidとフォローした人のidの組み合わせである。</p>
                        <p>以下フォローした人のid：follower_id、フォローされた人のid：followee_id</p>
                        <p class="mt-5">テーブル</p>
                        <p>id:1 follower_id:2 followee_id:3</p>
                        <p>id:2 follower_id:1 followee_id:3</p>
                        <p>id:2 follower_id:2 followee_id:1</p>
                        <p>id:2 follower_id:3 followee_id:1</p>

                        <p>上記のようなカラムが4つ保存されている状態をゴールとして考えていく。</p>
                    </li>
                    <li class="mt-5">
                        <p class="mt-5">・フォロー機能に必要なテーブル</p>
                        <p>
                            投稿に対してコメントをしたりいいねをしたりする機能を作る際に必要なテーブルはpostsとcomments、
                            postsとlikesのように異なるカラムを保持するテーブルであった。
                        </p>
                        <p>
                            一方フォロー機能に必要なテーブルのカラムにはフォローされた人のidとフォローした人のid、とどちらもuser_idを格納すればよい。
                            よってフォロー機能に必要なテーブルをfollowsテーブルとするとfollowsテーブルはフォローする人となるusersテーブルのカラムとフォローされる人となるusersテーブルのカラムに紐づける必要があることがわかる。
                        </p>
                        <p>
                            下記よりユーザーid1のユーザーはid2,3のユーザをフォローすることができ、一対多の関係となっている。<br>
                            (フォローする人となるusersテーブルカラムに対してとフォローされる人となるusersテーブルカラムが複数ある)<br>
                            また、ユーザーid1のユーザーはid2,3のユーザにフォローされることができ、多対一の関係となっている。<br>
                            (フォローされる人となるusersテーブルカラムに対してとフォローする人となるusersテーブルカラムが複数ある)
                        </p>
                        <p>
                            <p>id:1 follower_id:1 followee_id:2</p>
                            <p>id:2 follower_id:1 followee_id:3</p>
                            <p>id:2 follower_id:2 followee_id:1</p>
                            <p>id:2 follower_id:3 followee_id:1</p>
                        </p>
                        <p>このようにテーブル間（今回はカラム間）で多対多になる場合このfollowsテーブルは2つのテーブルの外部キーを組み合わせた中間テーブルとなり、ユーザーとユーザーの間の関係を保持する必要がある。</p>
                    </li>
                    <li class="mt-5">
                        <p>・使用するリレーションメソッドに関して</p>
                        <p>hasMany,belongsToは多対多では使用せずbelongsToManyを使用する。</p>
                    </li>
                </ul>
        </div>
        <div class="mt-[100px] border-t pt-5">
            <h2 class="font-bold text-3xl">2.ユーザーがフォローした人、された人の一覧・投稿を表示できる機能--Lv2</h2>
            <strong class="block mt-10">実装する際の考え方</strong>
    </div>
</x-app-layout>