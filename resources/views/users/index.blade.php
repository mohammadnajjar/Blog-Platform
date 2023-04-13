<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Users List') }}
            </h2>
            <a href="{{ route('users.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-3">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Create User') }}
                </h2>
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="table-responsive">
                        <table class="table w-full">
                            <thead>
                            <tr class="border-4 border-gray-200">
                                <th class="px-16 py-2 flex justify-center">{{ __('ID') }}</th>
                                <th class="px-16 py-2 justify-center">{{ __('Name') }}</th>
                                <th class="px-16 py-2 justify-center">{{ __('Email') }}</th>
                                <th class="px-16 py-2 justify-center">{{ __('Role') }}</th>
                                <th class="px-16 py-2 flex justify-center">{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr class=" border-4 border-gray-200">
                                    <td class="px-16 py-2 flex justify-center">{{ $user->id }}</td>
                                    <td class="px-16 py-2 justify-center text-center">{{ $user->name }}</td>
                                    <td class="px-16 py-2 justify-center text-center">{{ $user->email }}</td>
                                    <td class="px-16 py-2 justify-center text-center">{{ $user->role }}</td>
                                    <td class="px-16 py-2 flex justify-center text-center">
                                        <a href="{{ route('users.show', $user) }}" class="bg-blue-500 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded mx-2">{{ __('View') }}</a>
                                        <a href="{{ route('users.edit', $user) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mx-2">{{ __('Edit') }}</a>
                                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-2" onclick="return confirm('Are you sure you want to delete this user?')">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
        </div>
    </div>
</x-app-layout>
