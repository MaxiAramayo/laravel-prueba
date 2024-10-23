<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center px-4 py-2">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Publicaciones') }}

            </h2>
            <a href="{{ route('posts.create') }}"
                class="bg-gray-100 dark:text-gray-600 rounded px-4 py-2 cursor-pointer">Crear Publicacion</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col p-6 text-gray-900 dark:text-gray-100">

                    <table class="mb-4 justify-center items-center">
                        @forelse ($posts as $post)
                            <tr class="border-b border-gray-200 text-sm">
                                <td class="px-6 py-4"> {{ $post->title }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('posts.edit', $post) }}" class="text-indigo">Editar</a>
                                </td>
                                <td class="px-6 py-4 cursor-pointer">
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Eliminar"
                                            class="bg-red-200 dark:text-gray-600 rounded px-4 py-2 cursor-pointer"
                                            onclick="return confirm('Desea eliminar esta publicacion?')">
                                    </form>
                                </td>

                            </tr>
                        @empty
                            <h1>No hay publicaciones</h1>
                        @endforelse

                    </table>
                    {{ $posts->links() }}


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
