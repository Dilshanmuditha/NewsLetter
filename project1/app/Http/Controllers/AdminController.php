<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Repositories\PostRepository;

class AdminController extends Controller
{
    protected $postRepository;

    public function __construct(
        PostRepository $postRepository,
    ) {
        $this->postRepository = $postRepository;
    }

    public function dashboardCreate()
    {
        return view('post-create');
    }

    public function index()
    {
        return view('dashboard', [
            'post' => $this->postRepository->getActive(),
        ]);
    }

    public function store(PostRequest $request)
    {

        $attributes = $request->input();

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        $this->postRepository->create($attributes);

        return redirect('/dashboard');
    }
}
