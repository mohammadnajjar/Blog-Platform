<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Comments') }}
        </h1>
    </x-slot>
    bash
    Copy code
    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Post') }}</th>
                    <th>{{ __('User') }}</th>
                    <th>{{ __('Content') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>{{ $comment->post->title }}</td>
                        <td>{{ $comment->user->name }}</td>
                        <td>{{ $comment->content }}</td>
                        <td>
                            @if ($comment->status == 'pending')
                                <span class="badge badge-warning">{{ __('Pending') }}</span>
                            @elseif ($comment->status == 'approved')
                                <span class="badge badge-success">{{ __('Approved') }}</span>
                            @elseif ($comment->status == 'rejected')
                                <span class="badge badge-danger">{{ __('Rejected') }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($comment->status == 'pending')
                                <form action="{{ route('comments.approve', $comment->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success">{{ __('Approve') }}</button>
                                </form>
                                <form action="{{ route('comments.reject', $comment->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">{{ __('Reject') }}</button>
                                </form>
                            @endif
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
