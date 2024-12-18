@extends('partials.layout')
@section('content')
    <div class="flex justify-center">
        {{ $posts->links() }}
    </div>
    <div class="grid-cols-4 grid gap-4">
        @foreach($posts as $post)
            <div>
                <div class="card bg-base-100 shadow-xl min-h-full">
                    @if($post->image)
                        <figure>
                            <img src="{{ $post->image }}"
                                alt="Shoes" />
                        </figure>
                    @endif
                    <div class="card-body">
                        <h2 class="card-title">{{ $post->title }}</h2>
                        <p>{{ $post->snippet }}</p>
                        <div class="flex flex-row">
                            <div class="basis-1/2">
                                <div class="tooltip w-fit" data-tip="{{ $post->created_at }}">
                                    <p>{{ $post->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            @if($post->created_at->notEqualTo($post->updated_at))
                                <div class="basis-1/2 text-right">
                                    <div class="tooltip w-fit" data-tip="{{ $post->updated_at }}">
                                        <p>Edited</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <p><a href="{{route('user', ['user' => $post->user])}}">{{ $post->user->name }}</a></p>
                        <p><a href="{{route('category', ['category' => $post->category])}}">{{ $post->category->name }}</a></p>

                        <p>Comments: {{ $post->comments_count }}</p>
                        <p>Likes: {{ $post->likes_count }}</p>
                        <form action="{{ route('like', ['post' => $post]) }}" method="POST">
                            @csrf
                            @if($post->authHasLiked)
                                <button class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition">Unlike</button>
                            @else
                                <button class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition">Like</button>
                            @endif
                        </form>
                        <div class="flex flex-wrap gap-1">
                            @foreach ($post->tags as $tag)
                                <a href="{{route('tag', $tag->id)}}"><div class="badge badge-primary badge-outline">{{$tag->name}}</div></a>
                            @endforeach
                        </div>
                        <div class="card-actions justify-end">
                            <a href="{{ route('post', ['post' => $post]) }}"
                               class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition">
                               Read More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
