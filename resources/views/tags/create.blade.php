<!-- resources/views/tags/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create Tag') }}
            </h2>
            <a href="{{ route('tags.index') }}" class="btn btn-primary text-white">{{ __('Back to Tags') }}</a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('tags.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Tag Name</label>
                        <input type="text" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 dark:border-gray-600 rounded-md @error('name') border-red-600 @enderror" value="{{ old('name') }}" required>
                        @error('name')
                        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Create Tag
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
