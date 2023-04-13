<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Comments List') }}
            </h2>
            <a href="{{ route('comments.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-3">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Create Comment') }}
                </h2>
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class=" sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="table-responsive">
                        <table class="table w-full">
                            <thead>
                            <tr class="border-4 border-gray-200">
                                <th class="px-16 py-2 justify-center">{{ __('ID') }}</th>
                                <th class="px-16 py-2 flex justify-center">{{ __('Author') }}</th>
                                <th class="px-16 py-2 justify-center">{{ __('Comment') }}</th>
                                <th class="px-16 py-2 justify-center">{{ __('Post') }}</th>
                                <th class="px-16 py-2 justify-center">{{ __('Status') }}</th>
                                <th class="px-16 py-2 flex justify-center">{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($comments as $comment)
                                <tr class=" border-4 border-gray-200">
                                    <td class=" py-2 px-1 border text-center">{{ $comment->id }}</td>
                                    <td class=" py-2 px-1 border text-center">{{  $comment->user->name }}</td>
                                    <td class=" py-2 px-1 border text-center text-center">{{ $comment->content }}</td>
                                    <td class=" py-2 px-1 border text-center text-center">{{  $comment->post->title }}</td>
                                    <td class=" py-2 px-1 border text-center text-center">
                                        @if ($comment->status === 'pending')
                                            <form action="{{ route('comments.approve', $comment->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="bg-blue-500 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded mx-2">{{ __('Approve') }}</button>
                                            </form>
                                            <form action="{{ route('comments.reject', $comment->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-2">{{ __('Reject') }}</button>
                                            </form>
                                        @elseif ($comment->status === 'approved')
                                            <span class=" text-blue font-bold py-2 px-4 rounded mx-2">{{ __('Approved') }}</span>
                                        @elseif ($comment->status === 'rejected')
                                            <span class=" text-red font-bold py-2 px-4 rounded mx-2">{{ __('Rejected') }}</span>
                                        @endif

                                    </td>
                                    <td class=" py-2 px-1 flex text-center text-center justify-center ">
                                        <a href="{{ route('comments.show', $comment) }}" class="bg-blue-500 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded mx-2">{{ __('View') }}</a>
                                        <a href="{{ route('comments.edit', $comment) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mx-2">{{ __('Edit') }}</a>
                                        <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mx-2" onclick="return confirm('Are you sure you want to delete this comment?')">{{ __('Delete') }}</button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
                <div class="d-flex justify-content-center mb-4">
                    {{ $comments->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
