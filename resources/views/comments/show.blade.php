<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Comment Show') }}
            </h2>
            <a href="{{ route('comments.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-3">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Back to Comments') }}
                </h2>
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-800 border-b border-gray-700">
                    <div class="flex flex-row">
                        <div class="w-1/2">
                            <h3 class="text-lg">{{ __('Author') }}</h3>
                            <p class="mt-2 text-white">{{ $comment->user->name }}</p>
                        </div>
                    </div>
                    <div class="flex flex-row">
                        <div class="w-1/2">
                            <h3 class="text-lg">{{ __('Comment') }}</h3>
                            <p class="mt-2 text-white">{{ $comment->content }}</p>
                        </div>
                    </div>
                    <div class="flex flex-row">
                        <div class="w-1/2">
                            <h3 class="text-lg">{{ __('Post') }}</h3>
                            <p class="mt-2 text-white">{{ $comment->post->title }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


