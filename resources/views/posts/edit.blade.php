<x-layout :title="'Update Post'">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Update Post</h2>
            </div>
            

            <div class="px-6 py-4">
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded shadow-md mb-4">
                        <ul class="list-none p-0 m-0">
                            @foreach ($errors->all() as $error)
                                <li class="py-1 flex items-center">
                                    <span class="mr-2 text-red-500">⚠️</span> {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT');
                    <!-- Title Input -->
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                        <input
                            name="title"
                            type="text"
                            id="title"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-2 px-3 border"
                            value="{{ $post->title}}"
                        >
                    </div>
                    
                    <!-- Description Textarea -->
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea
                            name="description"
                            id="description"
                            rows="5"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-2 px-3 border"
                        
                        > {{ $post->description }}</textarea>
                        
                    </div>
                    {{-- @dd($users); --}}
                    <!-- Post Creator Select -->
                    <div class="mb-6">
                        <label for="creator" class="block text-sm font-medium text-gray-700 mb-1">Post Creator</label>
                        <select
                            name="post_creator"
                            id="creator"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 py-2 px-3 border bg-white"
                            
                            >
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $post->user_id == $user->id ? 'selected': '' }}>{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
<div class="mt-4 flex flex-col items-center">
    <p class="text-gray-700 font-semibold mb-2">Current Image</p>
    <div class="relative w-40 h-40 border border-gray-300 shadow-lg rounded-lg overflow-hidden">
        <img src="{{ Storage::url($post->photo) }}" 
             alt="Uploaded Image" 
             class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
    </div>
</div>                    <input type="file" name="photo"
                        class="block w-50 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 hover:bg-gray-100 my-3">
                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button
                            type="submit"
                            class="px-4 py-2 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 hover:cursor-pointer"
                            name="update"
                        >
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout> 