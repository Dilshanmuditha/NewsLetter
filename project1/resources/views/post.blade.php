<x-links />
<x-button class="m-4"><a href="/">Back</a></x-button>
<article class="transition-colors duration-300  border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 m-4 lg:mr-8">
            <img src="/storage/{{$post->thumbnail}}" alt="Blog Post illustration" class="rounded-xl">
        </div>
        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 pt-8 pb-6  lg:mt-0">
                <div class="mt-4">
                    <h1 class="text-3xl font-bold">
                        {{$post->title}}
                    </h1>
                    <span class="mt-2 block text-blue-400 text-xs">
                        Published <time>
                            {{$post->created_at->diffForHumans()}}
                        </time>
                    </span>
                </div>
            </header>
            <div>
                <p>{!!$post->body!!}</p>
            </div>
        </div>
        
        <section class="col-span-8 col-start-5 mt-10 space-y-6">
                    <x-comment-panel>
                        <form method="POST" action="/posts/{{ $post->slug }}/comment">
                            @csrf
                            <header class="flex items-center">
                                <img src="https://i.pravatar.cc/60?u={{auth()->id()}}" alt="" width="60px" height="60px" class="rounded-xl">
                                <h2 class="ml-4">Want to participate?</h2>
                            </header>
                            <div class="mt-6">
                                <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="5" placeholder="Quick type Something" required></textarea>
                            </div>
                            @error('body')
                            <span class="text-xs text-red-500">{{$message}}</span>
                            @enderror
                            <div class="flex justify-end mt-6 pt-6 border-t border-gray-300 ">
                                <button type="submit" class="border rounded-xl bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10">
                                    Post </button>
                            </div>
                        </form>
                    </x-comment-panel>

                    @foreach($post->comment as $comment)
                    <x-comment :comment="$comment" />
                    @endforeach

                </section>
       
                </article>