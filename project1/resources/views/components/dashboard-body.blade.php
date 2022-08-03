@props(['post'])
<x-links />
<x-button class="m-4"><a  href="/">Back</a></x-button>

        @foreach($post as $post)
        <div class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6 relative flex items-top justify-center sm:items-center py-10 sm:pt-5">
        <div class="flex-1 lg:mr-8">
            <img src="/storage/{{$post->thumbnail}}" alt="Blog Post illustration" class="rounded-xl">
        </div>
        <h1 class="font-bold text-3xl lg:text-4xl mb-10">
            {{$post->title}}
        </h1>
        </div>
        <div class="max-w-4xl mx-auto mt-6 lg:mt-20  sm:items-center lg:text-lg leading-loose">
            {!!$post->body!!}
        </div>
        @endforeach
        
