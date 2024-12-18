<div class="navbar bg-base-100">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </div>
            <ul tabindex="0"
                class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                <li><a>Item 1</a></li>
                <li>
                    <a>Parent</a>
                    <ul class="p-2">
                        <li><a>Submenu 1</a></li>
                        <li><a>Submenu 2</a></li>
                    </ul>
                </li>
                <li><a>Item 3</a></li>
            </ul>
        </div>
        <a href="{{route('home')}}" class="btn btn-ghost text-xl">{{ config('app.name') }}</a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            {{-- <li><a>Item 1</a></li> --}}
            @foreach (App\Models\Category::where('parent_id', null)->get() as $category)
                @if($category->children->count())
                    <li>
                        <details>
                            <summary>{{$category->name}}</summary>
                            <ul class="p-2 z-10">
                                @foreach($category->children as $child)
                                    <li><a href="{{route('category', ['category' => $child])}}">{{$child->name}}</a></li>
                                @endforeach
                            </ul>
                        </details>
                    </li>
                @else
                    <li><a href="{{route('category', ['category' => $category])}}">{{$category->name}}</a></li>
                @endif

            @endforeach



            @auth
                <li>
                    <details>
                        <summary>Admin</summary>
                        <ul class="p-2 z-10">
                            <li><a href="{{route('posts.index')}}">Posts</a></li>
                        </ul>
                    </details>
                </li>
            @endauth
        </ul>
    </div>
    <div class="navbar-end gap-2">
        @auth
            <ul class="menu menu-horizontal px-1">
                <li>
                    <details>
                        <summary>{{ auth()->user()->name }}</summary>
                        <ul class="p-2">
                            <li><a href="{{route('profile.edit')}}">Profile</a></li>
                            <li><button form="logout">Logout</button></li>
                        </ul>
                    </details>
                </li>
            </ul>
            <form id="logout" method="POST" action="{{ route('logout') }}">
                @csrf
            </form>
        @else
            <a class="btn btn-secondary" href="{{ route('register') }}">Register</a>
            <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
        @endauth
    </div>
</div>
