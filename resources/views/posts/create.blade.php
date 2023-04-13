<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create User') }}
            </h2>
            <a href="{{ route('users.index') }}" class="btn btn-primary">{{ __('Back to Users') }}</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6  border-b border-gray-200">
                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="text-white" for="title" class="form-label">{{ __('Title') }}</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required autofocus>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="text-white"  for="content" class="form-label">{{ __('Content') }}</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5" required>{{ old('content') }}</textarea>
                            @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Add this inside the form element -->
                        <div class="mb-3">
                            <label for="tags" class="form-label">Tags</label>
                            <select name="tags[]" id="tags" class="form-control" multiple>
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}" {{ (isset($post) && $post->tags->contains($tag)) ? 'selected' : '' }}>{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="text-white btn btn-primary">{{ __('Create') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Include the Select2 library and initialize it -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $('#tags').select2();
        });
    </script>
</x-app-layout>
