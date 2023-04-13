<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <a href="{{route('posts.index')}}">{{ __('Posts List') }}</a>
            </h2>
            <a href="{{ route('posts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-3">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Create Post') }}
                </h2>
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($posts->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($posts as $post)
                                <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden">
                                    <div class="p-6">
                                        <h3 class="text-lg font-medium text-gray-800">{{ $post->title }}</h3>
                                        <p class="text-sm text-gray-600">{{ $post->created_at->diffForHumans() }}</p>
                                        <div class="mt-4 mb-2">
                                            @foreach ($post->tags as $tag)
                                                <a href="{{ route('posts.filterByTag', $tag) }}" class="inline-block bg-gray-300 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $tag->name }}</a>
                                            @endforeach
                                        </div>
                                        <div class="flex">
                                            <a href="{{ route('posts.show', $post) }}" class="block font-semibold text-blue-600 hover:text-blue-800">{{ __('Read more') }}</a>
                                            <a href="{{ route('posts.edit', $post) }}" class=" block ml-4 font-semibold text-yallow-600 hover:text-yallow-800">{{ __('Edit') }}</a>
                                            <form action="{{ route('posts.destroy', $post) }}" method="POST" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="ml-4 font-semibold text-yallow-600 hover:text-yallow-800" onclick="return confirm('Are you sure you want to delete this user?')">{{ __('Delete') }}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-8">
                            {{ $posts->links() }}
                        </div>
                    @else
                        <p class="text-gray-600">{{ __('No posts found.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
