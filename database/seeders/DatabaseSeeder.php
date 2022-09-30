<?php

namespace Database\Seeders;

use App\Models\Abundance;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Organism;
use App\Models\Sample;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();

        Organism::factory()
            ->count(100)
            ->create();

        DB::table('crops')->insert([
            ['name' => 'Apple'],
            ['name' => 'Tomato'],
            ['name' => 'Corn'],
            ['name' => 'Rice'],
            ['name' => 'Cotton']]
        );
            
        Sample::factory()
            ->count(20)
            ->create()->each(function($sample) use ($faker) {
                $organisms = Organism::inRandomOrder()->limit($faker->numberBetween(50, 100))->get();
                $organisms->each(function($organism) use ($sample, $faker){
                    $abundance = new Abundance();
                    $abundance->sample_id = $sample->id;
                    $abundance->organism_id = $organism->id;
                    $abundance->num = $faker->numberBetween(1000, 9000);
                    $abundance->save();
                });
            });
    }
}
