<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $user->name }}
            </h2>
            <a href="{{ route('users.index') }}" class="text-gray-800 dark:text-gray-200 btn btn-primary">{{ __('Back to users') }}</a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <ul>
                        <li><strong>ID:</strong> {{ $user->id }}</li>
                        <li><strong>Name:</strong> {{ $user->name }}</li>
                        <li><strong>Email:</strong> {{ $user->email }}</li>
                        <li><strong>Role:</strong> {{ $user->role }}</li>
                        <li><strong>Created At:</strong> {{ $user->created_at }}</li>
                        <li><strong>Updated At:</strong> {{ $user->updated_at }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
