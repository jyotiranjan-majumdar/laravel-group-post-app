@extends('layout.app')

@section('content')

<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
        <form action="{{route('posts')}}" method="post" class="mb-4">
            @csrf
        <div class="mb-4">
            <label for="body" class="sr-only">Body</label>
            <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 
            border-2 w-full p-4 rounded-lg @error('body') border-red-500
             @enderror" placeholder="Post your message"></textarea>
             
             @error('body')
             <div class="text-red-500 mt-2 text-sm">
             {{$message}}    
             </div>    
         @enderror

             <div>
                 <button type="submit" class="bg-blue-500 text-white px-4 py-2 p-2 m-2 rounded font-medium"> Post</button>
             </div>
        </div>
        </form>

        @if ($post->count())
            @foreach ($post as $posts)
                <div class="mb-4">
                    <a href="" class="forn-bold">{{$posts->user->username}}</a><span 
                    class="text-gray-600 text-sm">{{$posts->created_at->diffForHumans()}}</span>
                    <p class="mb-2">{{$posts->body}}</p>
                    
                    @if ($posts->ownedby(auth()->user()))
                        <div>
                            <form action="{{ route('posts.destroy', $posts) }}" method="post" class="mr-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-blue-500">Delete</button>
                            </form>
                        </div>
                    @endif

                    <div class="flex items-center" >
                    @if (!$posts->likeby(auth()->user()))
                    <form action="{{ route('posts.likes', $posts->id) }}" method="post" class="mr-1">
                        @csrf
                        <button type="submit" class="text-blue-500">like</button>
                    </form>

                    @else

                    {{-- <form action="{{ route('posts.likes', $posts->id) }}" method="post" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">dislike</button>
                     </form> --}}
                    
                     @endif
                     <span>{{$posts->likes->count()}} {{Str::plural('like',$posts->likes->count())}}</span>

                    </div>

                </div>    
            @endforeach

            {{ $post->links() }}

        @else
        <p>there is no post
        @endif
    </div>
</div>

  

@endsection