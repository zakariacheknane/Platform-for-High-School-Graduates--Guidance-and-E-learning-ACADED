<?php

namespace Database\Factories;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
   //ajouter des fakes donnee aa la base de donnes//
     public function definition()
    {
        $title=$this->faker->realText($maxNbChars=20,$indexSize=2);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => $this->faker->text,
            'image' => $this->faker->imageUrl(640,480),
          
          ];
    }
}
