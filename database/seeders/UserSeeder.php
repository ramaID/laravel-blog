<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make(fake()->password);
        $data = [];

        for ($i=0; $i < 1_000; $i++) {
            $data[] = User::factory()->make()->toArray() + compact('password');
        }
        $chunkData = array_chunk($data, 100);
        dd(count($data), count($chunkData));

        foreach (array_chunk($data, 100) as $chunkUsers) {
            User::query()->insert($chunkUsers);
        }
    }
}
