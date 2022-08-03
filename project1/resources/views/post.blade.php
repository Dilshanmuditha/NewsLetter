<x-links/>
<x-button class="m-4" ><a href="/">Back</a></x-button>
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
</article>

