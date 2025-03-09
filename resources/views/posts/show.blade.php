<x-layout>
    <div class="max-w-3xl mx-auto space-y-6">
        <!-- Post Info Card -->
        <div class="bg-white rounded border border-gray-200">
            <div class="px-4 py-3 bg-gray-50 border-b border-gray-200">
                <h2 class="text-base font-medium text-gray-700">Post Info</h2>
            </div>
            <div class="px-4 py-4">
                <div class="mb-2">
                    <h3 class="text-lg font-medium text-gray-800">Title :- <span class="font-normal">{{$post->title}}</span></h3>
                </div>
                <div>
                    <h3 class="text-lg font-medium text-gray-800">Description :-</h3>
                    <p class="text-gray-600">{{$post->description}}</p>
                </div>
            </div>
        </div>

        <!-- Post Creator Info Card -->
        <div class="bg-white rounded border border-gray-200">
            <div class="px-4 py-3 bg-gray-50 border-b border-gray-200">
                <h2 class="text-base font-medium text-gray-700">Post Creator Info</h2>
            </div>
            <div class="px-4 py-4">
                <div class="mb-2">
                    <h3 class="text-lg font-medium text-gray-800">Name :- <span class="font-normal">{{$post->user->name}}</span></h3>
                </div>
                <div class="mb-2">
                    <h3 class="text-lg font-medium text-gray-800">Email :- <span class="font-normal">{{$post->user->email}}</span></h3>
                </div>
                <div>
                    <h3 class="text-lg font-medium text-gray-800">Created At :- <span class="font-normal">{{$post->user->created_at->format('l jS \\of F Y h:i:s A');}}</span></h3>
                </div>
            </div>
        </div>
         <!-- Comments Section -->
        <div class="bg-white rounded border border-gray-200">
            <div class="px-4 py-3 bg-gray-50 border-b border-gray-200">
                <h2 class="text-base font-medium text-gray-700">Comments</h2>
            </div>
            <div class="px-4 py-4">
                <!-- Display Comments -->
                @foreach ($post->comments as $comment)
                    <div class="mb-4 p-3 border rounded bg-gray-50">
                        {{-- <h3 class="text-sm font-medium text-gray-700">{{ $comment->user->name }}:</h3> --}}
                        <p class="text-gray-600">{{ $comment->content }}</p>
                        <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                @endforeach

                <!-- Add New Comment Form -->
                <form action="{{ route('comments.store', $post->id) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="content" class="block text-sm font-medium text-gray-700">Add a Comment</label>
                        <textarea name="content" id="content" rows="3" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-2 px-3 border"></textarea>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-medium rounded hover:bg-blue-700">
                        Submit
                    </button>
                </form>
            </div>
        </div>
        <!-- Back Button -->
        <div class="flex justify-end">
            <a href="{{ route('posts.index') }}" class="px-4 py-2 bg-gray-600 text-white font-medium rounded hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Back to All Posts
            </a>
        </div>
    </div>
</x-layout>