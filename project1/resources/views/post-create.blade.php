<x-links />

<section class="px-6 py-8 ">
    <main class="mx-auto max-w-4xl mt-10 bg-gray-100 border border-green-300 p-6 rounded-xl">
        <h1 class="text-center font-bold text-xl mb-10 text-green-600">Publish a New Post !</h1>
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                    Title
                </label>
                <input class="border border-gray-400 p-2 w-full" type="text" name="title" id="title" value="{{ old('title') }}" required>
                @error('Title')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug">
                    Slug
                </label>
                <textarea class="border border-gray-400 p-2 w-full" type="text" name="slug" id="slug" required>{{ old('slug') }}</textarea>
                @error('slug')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="thumbnail">
                    Thumbnail
                </label>
                <input class="border border-gray-400 p-2 w-full" type="file" name="thumbnail" id="thumbnail" required>{{ old('thumbnail') }}</input>
                @error('thumbnail')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="excerpt">
                    Excerpt
                </label>
                <textarea class="border border-gray-400 p-2 w-full" type="text" name="excerpt" id="excerpt" required>{{ old('excerpt') }}</textarea>
                @error('excerpt')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="body">
                    Body
                </label>
                <textarea class="border border-gray-400 p-2 w-full" type="text" name="body" id="body" required>{{ old('body') }}</textarea>
                @error('body')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="category_id">
                    Category
                </label>

                <select name="category_id" id="category_id">
                    @php
                    $categories = \App\Models\Category::all();
                    @endphp
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ ucwords ($category->name) }}</option>
                    @endforeach

                </select>
                @error('category')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-green-300 text-white rounded py-2 px-4 hover:bg-green-500">
                    Publish
                </button>
            </div>
        </form>
    </main>
</section>