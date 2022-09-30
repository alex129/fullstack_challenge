<?php

namespace Database\Factories;

use App\Models\Organism;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrganismFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Organism::class;

    private const SYLLABLES =  [
        'bo', 'try', 'chi', 'lu', 'na',
        'po', 'ly', 'di', 'diop', 'psi', 'da',
        'tra', 'che', 'lla', 'pa', 'bra', 'chys', 'co', 'dich',
        'so', 'mo'
    ];

    private const GENUS_ENDS = [
        'um', 'da', 'ta', 'lla', 'me'
    ];

    private const SPECIES_ENDS = [
        'tens', 'ria', 'dae', 'ca'
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $genus = $this->faker->randomElements(self::SYLLABLES, $this->faker->numberBetween(2,5));
        $genus[] = $this->faker->randomElement(self::GENUS_ENDS);

        $species = $this->faker->randomElements(self::SYLLABLES, $this->faker->numberBetween(2,4));
        $species[] = $this->faker->randomElement(self::SPECIES_ENDS);


        return [
            'genus' => ucfirst(implode($genus)),
            'species' => ucfirst(implode($species)),
        ];
    }
}
