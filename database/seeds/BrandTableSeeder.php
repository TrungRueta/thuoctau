<?php

use App\Blend\Blend;
use App\Brand\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Created by PhpStorm.
 * User: rueta
 * Date: 4/20/15
 * Time: 8:12 PM
 */
class BrandTableSeeder extends Seeder
{

    public function run()
    {

        $faker = Faker\Factory::create();

        foreach(range(1,10) as $index)
        {
            $companyName = $faker->company;

            $brand = Brand::create([
                'name' => $companyName ,
                'slug' => str_slug($companyName),
                'avatar' => $faker->imageUrl(150,150),
                'description' => $faker->bs
            ]);

            // create blends
            foreach (range(1, 20) as $ii) {
                $blendName = $faker->name;
                $blend = new Blend([
                    'name' => $blendName,
                    'slug' => str_slug($blendName),
                    'avatar' => $faker->imageUrl(150,150),
                    'description' => $faker->bs
                ]);

                // add blend link
                $blend->brand()->associate($brand);
                $blend->save();

            }
        }
    }
}