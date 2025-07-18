<?php 

namespace App\Repositories;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class PostRepository
{
    public function index(Request $request)
    {
        $query = Post::where('is_active', 1);

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        return $query->latest()->get();
    }

    public function create(array $data, User $user): Post
    {
        return $user->posts()->create($data);
    }

    public function update(array $data, Post $post): Post
    {
        $post->update($data);
        return $post;
    }

    public function delete(Post $post): bool
    {
        return $post->delete();
    }
}
