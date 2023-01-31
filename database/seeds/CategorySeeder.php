<?php

use App\Category;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = [
            'Attualità',
            'Scuola',
            'Famiglia',
            'Estero',
            'Cucina',
            'Programmazione',
            'Bestemmioni',
            'Gossip',
            'Terrorismo',
            'Fake News',
            'Oroscopo',
            'Giocattoli per bambini',
            'Preti',
        ];

        foreach ($categories as $category) {
            Category::create([
                'slug' => Category::getSlug($category),
                'name' => $category,
                'description' => $faker->paragraphs(rand(1, 5), true),
            ]);
        }
    }
}
