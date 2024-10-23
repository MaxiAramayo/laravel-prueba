@csrf

<div class="flex flex-col gap-3">
    <div class="flex flex-col">
        <label class="uppercase text-gray-700 dark:text-gray-200 text-xs">Titulo</label>

        <input type="text" name="title"
            class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'
            value="{{ old('title', $post->title) }}">
        <span class="text-xs text-red-600">
            @error('title')
                {{ $message }}
            @enderror
        </span>
    </div>

    <div class="flex flex-col">
        <label class="uppercase text-gray-700 dark:text-gray-200 text-xs">slug</label>

        <input type="text" name="slug"
            class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'
            value="{{ old('slug', $post->slug) }}">
        <span class="text-xs text-red-600">
            @error('slug')
                {{ $message }}
            @enderror
        </span>
    </div>

    <div class="flex flex-col">
        <label class="uppercase text-gray-700 dark:text-gray-200 text-xs">Cuerpo</label>

        <textarea type="text" name="body"
            class='border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'>{{ old('body', $post->body) }}</textarea>
        <span class="text-xs text-red-600">
            @error('body')
                {{ $message }}
            @enderror
        </span>
    </div>
    <div class="flex justify-between items-center">
        <a href="{{ route('posts.index') }}" class="text-indigo-600">Volver</a>
        <input type="submit" value="Enviar"
            class="text-center bg-gray-100 dark:text-gray-600 rounded px-6 py-2 cursor-pointer items-center justify-center">
    </div>


</div>
