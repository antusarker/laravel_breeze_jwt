<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;

class DashboardService
{
    public function getDashboardMetrics(): array
    {
        return [
            'total_posts'   => Post::count(),
            'total_users'   => User::where('role_id',2)->count(),
        ];
    }
}