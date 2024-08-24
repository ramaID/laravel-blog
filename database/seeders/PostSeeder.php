<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersID = User::query()->pluck('id')->toArray();
        $data = [];

        for ($i=0; $i < 400; $i++) {
            $data[] = Post::factory()->make([
                'author_id' => fake()->randomElement($usersID),
            ])->toArray() + ['id' => Str::ulid()];
        }

        foreach (array_chunk($data, 100) as $chunkPosts) {
            Post::query()->insert($chunkPosts);
        }
    }
}
