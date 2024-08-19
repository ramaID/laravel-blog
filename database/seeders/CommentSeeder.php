<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersID = User::query()->pluck('id')->toArray();
        $posstID = Post::query()->pluck('id')->toArray();
        $data = [];

        for ($i=0; $i < 6_000; $i++) {
            $id = Str::ulid();
            $data[] = Comment::factory()->make([
                'author_id' => fake()->randomElement($usersID),
                'post_id' => fake()->randomElement($posstID),
            ])->toArray() + compact('id');
        }

        foreach (array_chunk($data, 600) as $chunkComments) {
            Comment::query()->insert($chunkComments);
        }
    }
}
