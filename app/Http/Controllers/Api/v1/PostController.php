<?php
namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Services\PostService;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Traits\ApiResponseTrait;

class PostController extends Controller
{
    use ApiResponseTrait;
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

        return $this->apiResponse(true, 'All Post', $data, 200);
    }

    public function store(StorePostRequest $request)
    {
        $data = $this->postService->create($request->validated(), auth()->user());
        return $this->apiResponse(true, 'Data Created', $data, 201);
    }

    public function show(Post $post)
    {
        return $this->apiResponse(true, 'Single Data', $post, 200);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        if (auth()->id() !== $post->user_id) {
            return $this->apiResponse(true, 'You are not allowed to edit this post.', [], 422);
        }
        $data = $this->postService->update($request->validated(), $post);
        return $this->apiResponse(true, 'Data updated', $data, 200);
    }

    public function destroy(Post $post)
    {
        $data = $this->postService->delete($post);
        return $this->apiResponse(true, 'Data Deleted', $data, 200);
    }
}