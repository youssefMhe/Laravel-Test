<?php

namespace Database\Factories;

use App\Models\Equipe;
use App\Models\Match;
use Illuminate\Database\Eloquent\Factories\Factory;

class MatchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Match::class;
    public $table ='matches';

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'score' => '0 - 0',
            'equipe_locaux_id'=> Equipe::all()->random()->id,
            'equipe_visiteurs_id'=> Equipe::all()->random()->id,
            'created_at'=>now(),
            'updated_at'=>now(),
        ];
    }
}
