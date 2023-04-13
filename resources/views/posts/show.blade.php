<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Post Show') }}
            </h2>
            <a href="{{ route('posts.index') }}" class="btn btn-primary">{{ __('Back to posts') }}</a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-row">
                        <div class="w-1/2">
                            <h3 class="text-lg">{{ __('Title') }}</h3>
                            <p class="mt-2">{{ $post->title }}</p>
                        </div>
                    </div>
                    <div class="flex flex-row">
                        <div class="w-1/2">
                            <h3 class="text-lg">{{ __('Content') }}</h3>
                            <p class="mt-2">{{ $post->content }}</p>
                        </div>
                    </div>
                    <div class="flex flex-row">
                        <div class="w-1/2">
                            <h3 class="text-lg">{{ __('Author') }}</h3>
                            <p class="mt-2">{{ $post->user->name }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
