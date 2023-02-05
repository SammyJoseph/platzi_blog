@csrf
<label for="title" class="uppercase text-gray-700 text-xs">Título</label>
<span class="text-xs text-red-600">@error('title') {{ $message }} @enderror</span> {{-- This is the error message from $request->validate() --}}
<input type="text" name="title" id="title" class="w-full border border-gray-300 p-2 rounded mt-1 mb-5" value="{{ old('title', $post->title) }}">

<label for="slug" class="uppercase text-gray-700 text-xs">Slug</label>
<span class="text-xs text-red-600">@error('slug') {{ $message }} @enderror</span> {{-- This is the error message from $request->validate() --}}
<input type="text" name="slug" id="slug" class="w-full border border-gray-300 p-2 rounded mt-1 mb-5" value="{{ old('slug', $post->slug) }}">

<label for="body" class="uppercase text-gray-700 text-xs">Contenido</label>
<span class="text-xs text-red-600">@error('body') {{ $message }} @enderror</span>
<textarea name="body" id="body" class="w-full border border-gray-300 p-2 rounded mt-1 mb-5">{{ old('body', $post->body) }}</textarea>

<div class="flex">
    <a href="{{ route('posts.index') }}" class="text-gray-600 mr-4 flex items-center">
        <span class="material-symbols-outlined">undo</span>
        Volver
    </a>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-semibold flex items-center">
        <span class="material-symbols-outlined mr-1">save</span>
        Guardar
    </button>
</div>