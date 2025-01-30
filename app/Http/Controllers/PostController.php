<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $posts = Post::query()->paginate();

		return view('pages.posts.index', compact('posts'));
    }

	public function search(SearchPostRequest $request): View
	{
		$data = $request->validated();
		$posts = Post::query()
			->where('title', 'LIKE', '%' . $data['search'] . '%')
			->orWhere('content', 'LIKE', '%' . $data['search'] . '%')
		->paginate(10);

		return view('pages.posts.index', compact('posts'));
	}

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pages.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request): RedirectResponse
    {
        $data = $request->validated();
		$post = new Post($data);
		$post->save();

		return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): View
    {
        return view('pages.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View
    {
        return view('pages.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $data = $request->validated();
		$post->update($data);

		return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

		return redirect()->route('posts.index');
    }
}
