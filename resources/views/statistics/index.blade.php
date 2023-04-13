
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
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden">
                            <div class="p-6">
                                <h3 class="text-lg font-medium text-gray-800">a</h3>
                                <p class="text-sm text-gray-600">Get the number of posts published by each user</p>
                                <div class="mt-4 mb-2">
                                    <table class="text-center">
                                        <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Number of Posts</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($postsCountByUser as $count)
                                            <tr>
                                                <td>{{ $count->name }}</td>
                                                <td>{{ $count->num_posts }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden">
                            <div class="p-6">
                                <h3 class="text-lg font-medium text-gray-800">b</h3>
                                <p class="text-sm text-gray-600">Get the number of comments made by each user.</p>
                                <div class="mt-4 mb-2">
                                    <table class="text-center">
                                        <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Number of Comments</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($commentsCountByUser as $count)
                                            <tr>
                                                <td>{{ $count->name }}</td>
                                                <td>{{ $count->num_comments }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden">
                            <div class="p-6">
                                <h3 class="text-lg font-medium text-gray-800">c</h3>
                                <p class="text-sm text-gray-600">Get the top 5 users who have made the most comments.</p>
                                <div class="mt-4 mb-2">
                                    <table class="text-center">
                                        <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Number of Comments</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($topCommenters as $count)
                                            <tr>
                                                <td>{{ $count->name }}</td>
                                                <td>{{ $count->num_comments }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden">
                            <div class="p-6">
                                <h3 class="text-lg font-medium text-gray-800">d</h3>
                                <p class="text-sm text-gray-600">Get the top 5 most commented posts</p>
                                <div class="mt-4 mb-2">
                                    <table class="text-center">
                                        <thead>
                                        <tr>
                                            <th>Post ID</th>
                                            <th>Title</th>
                                            <th>Number of Comments</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($topCommentedPosts as $post)
                                            <tr>
                                                <td>{{ $post->id }}</td>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ $post->num_comments }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden">
                            <div class="p-6">
                                <h3 class="text-lg font-medium text-gray-800">e</h3>
                                <p class="text-sm text-gray-600">Get the most common tags used in the blog</p>
                                <div class="mt-4 mb-2">
                                    <table class="text-center">
                                        <thead>
                                        <tr>
                                            <th>Tags</th>
                                            <th>Number of Tags</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($mostCommonTags as $tag)
                                                <tr>
                                                    <td>{{ $tag->name }}</td>
                                                    <td>{{ $tag->num_tags }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden">
                            <div class="p-6">
                                <h3 class="text-lg font-medium text-gray-800">f</h3>
                                <p class="text-sm text-gray-600">Get the posts that have the most tags assigned to them.</p>
                                <div class="mt-4 mb-2">
                                    <table class="text-center">
                                        <thead>
                                        <tr>
                                            <th>Post Title</th>
                                            <th>Number of tags</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($postsWithMostTags as $post)
                                            <tr>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ $post->num_tags }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div class="bg-gray-100 rounded-lg shadow-lg overflow-hidden">
                            <div class="p-6">
                                <h3 class="text-lg font-medium text-gray-800">g</h3>
                                <p class="text-sm text-gray-600">Get the users who have never made a comment</p>
                                <div class="mt-4 mb-2">
                                    @if($usersWithNoComments->count() > 0)
                                        <ul>
                                            @foreach($usersWithNoComments as $user)
                                                <li>{{ $user->name }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>No users found.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
