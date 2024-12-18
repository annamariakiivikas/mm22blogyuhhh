@extends('partials.layout')
@section('content')
    <div class="card bg-base-100 shadow-xl min-h-full mb-2">
        <figure>
            <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Shoes" />
        </figure>
        <div class="card-body">
            <h2 class="card-title">{{ $post->title }}</h2>
            <p>{{ $post->body }}</p>
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
                @if($post->tags)
                    @foreach($post->tags as $tag)
                    <div class="badge badge-primary badge-outline">{{$tag->name}}</div>
                    @endforeach
                @endif

            </div>
            <p class="text-neutral-content">{{ $post->user->name }}</p>
            <div class="card-actions justify-end">

            </div>
        </div>
    </div>

    <div class="card bg-base-200 shadow-xl min-h-full mb-2">
        <div class="card-body ">
            <form action="{{route('comment', ['post' => $post])}}" method="POST">
                @csrf
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Comment</span>
                    </div>
                    <textarea name="body" rows="4" placeholder="Write something cool..."
                        class="textarea textarea-bordered w-full @error('body') textarea-error @enderror">{{ old('body') }}</textarea>
                    <div class="label">
                        @error('body')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </div>
                </label>
                <input type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition" value="Comment">
            </form>
        </div>
    </div>

    @foreach($post->comments as $comment)
        <div class="card bg-base-200 shadow-xl min-h-full mb-2">
            <div class="card-body ">
            <p>{{ $comment->body }}</p>
            <div class="flex flex-row">
                <div class="basis-1/2">
                    <div class="tooltip w-fit" data-tip="{{ $comment->created_at }}">
                        <p class="text-neutral-content">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                @if( $comment->created_at->notEqualTo( $comment->updated_at))
                    <div class="basis-1/2 text-right">
                        <div class="tooltip w-fit" data-tip="{{ $comment->updated_at }}">
                            <p class="text-neutral-content">Edited</p>
                        </div>
                    </div>
                @endif
            </div>
            <p class="text-neutral-content">{{ $comment->user->name }}</p>
            </div>
        </div>
    @endforeach
@endsection
