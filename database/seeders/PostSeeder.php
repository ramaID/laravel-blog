<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersID = User::query()->pluck('id')->toArray();
        $data = [];

        for ($i=0; $i < 200; $i++) {
            $data[] = Post::factory()->make([
                'author_id' => fake()->randomElement($usersID),
                'created_at' => now(),
                'updated_at' => now(),
            ])->toArray() + ['id' => Str::ulid()];
        }

        foreach (array_chunk($data, 100) as $chunkPosts) {
            Post::query()->insert($chunkPosts);
        }
    }
}
