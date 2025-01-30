<x-app-layout>    <div class="h-screen w-full px-96 py-12">        <form action="{{route("posts.update", $post)}}" method="POST">            @method('PUT')            @csrf            <div class="space-y-12">                <div class="border-b border-gray-900/10 pb-12">                    <h2 class="text-base/7 font-semibold text-gray-900">Post</h2>                    <p class="mt-1 text-sm/6 text-gray-600">Edit some post.</p>                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">                        <div class="col-span-full">                            <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>                            <div class="mt-2">                                <div class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">                                    <input type="text" name="title" id="title" class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6" placeholder="Laravel News" value="{{$post->title}}">                                </div>                            </div>                            @error('title')                            <span class="text-sm text-red-500">{{$message}}</span>                            @enderror                        </div>                        <div class="col-span-full">                            <label for="content" class="block text-sm/6 font-medium text-gray-900">Content</label>                            <div class="mt-2">                                <textarea name="content" id="content" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{$post->content}}</textarea>                            </div>                            @error('content')                            <span class="text-sm text-red-500">{{$message}}</span>                            @enderror                        </div>                        <div class="col-span-full">                            <label for="author" class="block text-sm/6 font-medium text-gray-900">Author</label>                            <div class="mt-2">                                <div class="flex items-center rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">                                    <input type="text" name="author" id="author" class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6" placeholder="janesmith" value="{{$post->author}}">                                </div>                            </div>                            @error('author')                            <span class="text-sm text-red-500">{{$message}}</span>                            @enderror                        </div>                    </div>                </div>            </div>            <div class="mt-6 flex items-center justify-end gap-x-6">                <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>            </div>        </form>    </div></x-app-layout>