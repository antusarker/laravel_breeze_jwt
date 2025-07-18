<?php 

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;
use App\Models\User;
use Illuminate\Http\Request;

class PostService
{
    protected $postRepo;

    public function __construct(PostRepository $postRepo)
    {
        $this->postRepo = $postRepo;
    }

    public function index(User $user, Request $request): array
    {
        $data['alldata'] = $this->postRepo->index($request);
        return $data;
    }

    public function create(array $data, User $user): Post
    {
        $data = $this->postRepo->create($data, $user);

        return $data;
    }

    public function update(array $data, Post $post): Post
    {
        $data = $this->postRepo->update($data, $post);

        return $data;
    }

    public function delete(Post $post): bool
    {
        return $this->postRepo->delete($post);
    }
}
