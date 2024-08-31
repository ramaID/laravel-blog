<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class ShowPostsPageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $years = Post::query()
            ->select('id', 'author_id', 'title', 'published_at')
            ->with(['author', 'comments' => fn (HasMany $query) => $query->select('id')])
            ->whereNotNull('published_at')
            ->latest('id')
            ->get()
            ->groupBy(fn (Post $post) => $post->published_at->year)
            ->sortByDesc(fn ($posts, $year) => $year);

        return view('posts', compact('years'));
    }
}
