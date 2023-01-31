<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'php', 'laravel', 'html', 'javascript', 'python', 'vue', 'bootstrap', 'react', 'java', 'css', 'ruby',
        ];

        foreach ($tags as $tag) {
            Tag::create([
                'slug'  => Tag::getSlug($tag),
                'name'  => $tag,
            ]);
        }
    }
}

