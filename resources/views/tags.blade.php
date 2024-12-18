@extends('partials.layout')
@section('content')
    <div class="grid-cols-4 grid gap-4">
        @if(isset($tags))
        @foreach($tags as $tag)
            <div>
                <div class="card bg-base-100 shadow-xl min-h-full">
                    <div class="card-body">
                        <a href="{{route('tag', $tag->id)}}"><div class="badge badge-primary badge-outline">{{$tag->name}}</div></a>
                    </div>
                </div>
            </div>
        @endforeach
        @else
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
                                    <p class="text-neutral-content">{{ $post->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            @if($post->created_at->notEqualTo($post->updated_at))
                                <div class="basis-1/2 text-right">
                                    <div class="tooltip w-fit" data-tip="{{ $post->updated_at }}">
                                        <p class="text-neutral-content">Edited</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <p class="text-neutral-content"><a href="{{route('user', ['user' => $post->user])}}">{{ $post->user->name }}</a></p>
                        <p class="text-neutral-content"><a href="{{route('category', ['category' => $post->category])}}">{{ $post->category->name }}</a></p>

                        <p class="text-neutral-content">Comments: {{ $post->comments_count }}</p>
                        <p class="text-neutral-content">Likes: {{ $post->likes_count }}</p>
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
                                <div class="badge badge-primary badge-outline">{{$tag->name}}</div>
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
        @endif
    </div>
@endsection
