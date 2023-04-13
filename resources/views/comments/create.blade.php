<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Comment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('comments.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="post_id">
                                {{ __('Post') }}
                            </label>
                            <select name="post_id" id="post_id" class="form-select @error('post_id') border-red-500 @enderror" required>
                                <option value="">-- {{ __('Select Post') }} --</option>
                                @foreach ($posts as $post)
                                    <option value="{{ $post->id }}" {{ old('post_id') == $post->id ? 'selected' : '' }}>
                                        {{ $post->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('post_id')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
                                {{ __('Content') }}
                            </label>
                            <textarea name="content" id="content" class="form-textarea @error('content') border-red-500 @enderror" rows="3" required>{{ old('content') }}</textarea>
                            @error('content')
                            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
