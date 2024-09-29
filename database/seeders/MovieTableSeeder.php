<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;
class MovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = [
            [
                'name' => 'The Shawshanks Redemption',
                'slug' => 'the shawanks redemption',
                'category' => 'Drama',
                'video_url' => 'https://www.youtube.com/watch?v=VdsRQ4aYj_s',
                'thumbnail' => 'shawshank.jpg',
                'rating' => 9.3,
                'is_featured' => 1,
            ],
            [
                'name' => 'The Guardian',
                'slug' => 'the-guardian',
                'category' => 'Drama',
                'video_url' => 'https://www.youtube.com/watch?v=FfeGEUeK8X0',
                'thumbnail' => 'https://i.scdn.co/image/ab6761610000e5ebbdf7cc74b6e31201f2aa8a7e',
                'rating' => 9.3,
                'is_featured' => 0,
            ],
            [
                'name' => 'The Guardian II',
                'slug' => 'the-guardian-ii',
                'category' => 'Drama',
                'video_url' => 'https://www.youtube.com/watch?v=ZUdXHgBP-_8',
                'thumbnail' => 'https://picsum.photos/200/300',
                'rating' => 9.3,
                'is_featured' => 0,
            ],
        ];
        Movie::insert($movies);
    }
}
