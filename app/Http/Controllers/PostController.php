<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Services\PostService;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Session;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index(Request $request)
    {
        $user = auth()->user();
        $data = $this->postService->index($user, $request);

        $data['search_title'] = $request->title;
        $data['search_location'] = $request->location;

        return view('posts.index', $data);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StorePostRequest $request)
    {
        $this->postService->create($request->validated(), auth()->user());
        
        Session::flash('flash_message','Data Created successfully !');
        return redirect()->back()->with('status_color','success');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        if (auth()->id() !== $post->user_id) {
            return redirect()->back()->with([
                'status_color' => 'danger',
                'flash_message' => 'You are not allowed to edit this post.',
            ]);
        }
        $this->postService->update($request->validated(), $post);
        Session::flash('flash_message','Data updated successfully !');
        return redirect()->back()->with('status_color','success');
    }

    public function destroy(Post $post)
    {
        $this->postService->delete($post);
        Session::flash('flash_message','Data Deleted successfully !');
        return redirect()->back()->with('status_color','success');
    }
}